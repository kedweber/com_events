<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException,
    Behat\Behat\Event\ScenarioEvent;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//
require_once 'vendor/autoload.php';

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    private $driver;
    private $session;
    private $base_url;
    private static $mysqli;


    /**
     * Initializes context.
     * Every scenario g>ets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $this->base_url = $parameters['base_url'];
        $this->driver = new \Behat\Mink\Driver\Selenium2Driver($parameters['browser']);
        $this->session = new \Behat\Mink\Session($this->driver);

        FeatureContext::$mysqli = new mysqli("localhost:8889", "root", "root", "event-manager");

        if (FeatureContext::$mysqli->connect_errno) {
            throw new Exception("Failed to connect to MySQL: (" . FeatureContext::$mysqli->connect_errno . ") " . FeatureContext::$mysqli->connect_error);
        }
    }

    private static function truncate($table)
    {
        echo "\n\033[36m| truncating table: " . $table . "\033[0m\n";
        if (!FeatureContext::$mysqli->query("TRUNCATE tcbo4_" . $table)) {
            throw new Exception("Table truncate failed: (" . FeatureContext::$mysqli->errno . ") " . FeatureContext::$mysqli->error);
        }
    }

    /**
     * @BeforeScenario
     */
    public function before($event)
    {
        $this->session->start();
    }

    /**
     * @AfterScenario
     */
    public function afterScenario($event)
    {
        $this->session->reset();
    }

    /**
     * @AfterSuite
     */
    public static function afterSuite(\Behat\Behat\Event\SuiteEvent $event)
    {

    }

    /**
     * @BeforeSuite
     */
    public static function beforeSuite(\Behat\Behat\Event\SuiteEvent $event)
    {
        FeatureContext::truncate('cck_values');
        FeatureContext::truncate('events_blocks');
        FeatureContext::truncate('events_days');
        FeatureContext::truncate('events_events');
        FeatureContext::truncate('events_organisations');
        FeatureContext::truncate('events_rooms');
        FeatureContext::truncate('events_venues');
        FeatureContext::truncate('taxonomy_taxonomies');
        FeatureContext::truncate('taxonomy_taxonomy_relations');
    }

    /**
     * @Given /^I visit the login page$/
     */
    public function iVisitTheLoginPage()
    {
        $this->session->visit($this->base_url);
    }

    /**
     * @When /^I fill in "([^"]*)" with "([^"]*)"$/
     */
    public function iFillInWith($field, $value)
    {
        $this->session->getPage()->findField($field)->setValue($value);
    }

    /**
     * @When /^I click on "([^"]*)"$/
     */
    public function iClickOn($button)
    {
        $bt = $this->session->getPage()->findButton($button);

        if ($bt === null) {
            $bt = $this->session->getPage()->findLink($button);
        }

        $bt->click();
        $this->session->wait(5000, 'typeof window.jQuery == "function"');
    }

    /**
     * @Then /^I should see "([^"]*)"$/
     */
    public function iShouldSee($text)
    {
        if (strpos($this->session->getPage()->getText(), $text) === false) {
            throw new Exception("I do not see " . $text);
        }
    }

    /**
     * @When /^I click on "([^"]*)" in the menu$/
     */
    public function iClickOnInTheMenu($item)
    {
        $this->session->getPage()->findLink($item)->click();
    }

    /**
     * @When /^I click on the link "([^"]*)"$/
     */
    public function iClickOnTheLink($link)
    {
        $this->session->getPage()->findLink($link)->click();
    }

    /**
     * @When /^I choose "([^"]*)" as "([^"]*)"$/
     */
    public function iChooseAs($option, $select)
    {
        $select = implode("-", explode(" ", strtolower($select)));
        $this->session->getPage()->findField($select)->selectOption($option);
    }

    /**
     * @Then /^I should be at "([^"]*)"$/
     */
    public function iShouldBeAt($url)
    {
        if ($this->session->getCurrentUrl() !== $this->base_url . $url) {
            throw new Exception("Expected:\n" . $this->session->getCurrentUrl() . "\nBut got: \n" . $this->base_url . $url);
        }
    }

    /**
     * @When /^I click on the link "([^"]*)" in the left menu$/
     */
    public function iClickOnTheLinkInTheLeftMenu($link)
    {
        $this->session->getPage()->find('css', '.sidebar-nav')->findLink($link)->click();
    }

    /**
     * @When /^I click on "([^"]*)" in the toolbar$/
     */
    public function iClickOnInTheToolbar($link)
    {
        $this->session->getPage()->find('css', '#toolbar')->findLink($link)->click();
    }

    /**
     * @Then /^I should see "([^"]*)" in the list$/
     */
    public function iShouldSeeInTheList($text)
    {
        if (strpos($this->session->getPage()->find('css', '.-koowa-grid')->getText(), $text) === false) {
            throw new Exception("I do not see " . $text . "\nI do see: \n" . $this->session->getPage()->find('css', '.-koowa-grid')->getText());
        }
    }

    /**
     * @When /^I fill in the editor "([^"]*)" with "([^"]*)"$/
     */
    public function iFillInTheEditorWith($id, $value)
    {
        $this->session->evaluateScript('window.tinymce.get("' . $id . '").setContent("' . $value . '")');
    }

    /**
     * @Then /^I should see "([^"]*)" at "([^"]*)"$/
     */
    public function iShouldSeeAt($value, $fieldName)
    {
        $fieldName = implode("-", explode(" ", strtolower($fieldName)));
        $field = $this->session->getPage()->findField($fieldName);

        if ($field === null) {
            throw new Exception("Field named: " . $fieldName . " not found.");
        }

        if ($field->getValue() !== $value) {
            throw new Exception("I do not see: " . $value);
        }
    }

    /**
     * @Then /^I should see "([^"]*)" selected at "([^"]*)"$/
     */
    public function iShouldSeeSelectedAt($value, $fieldName)
    {
        $fieldName = implode("-", explode(" ", strtolower($fieldName)));
        $field = $this->session->getPage()->findField($fieldName);

        if ($field === null) {
            throw new Exception("Field named: " . $fieldName . " not found.");
        }

        if ($field->getValue() !== $value && $field->getValue() !== implode("-", explode(" ", strtolower($value))) && $value !== trim($this->session->evaluateScript('var e = document.getElementById("' . $field->getAttribute('id') . '"); return e.options[e.selectedIndex].text;'))) {
            throw new Exception("I do not see: " . $value);
        }
    }

    /**
     * @Then /^I should see "([^"]*)" at the editor "([^"]*)"$/
     */
    public function iShouldSeeAtTheEditor($value, $id)
    {
        $id = implode("-", explode(" ", strtolower($id)));

        if ($this->session->evaluateScript('return window.tinymce.get("' . $id . '").getContent().replace(/(<([^>]+)>)/ig,"") === "' . $value . '"') !== true) {
            throw new Exception("I do not see: " . $value);
        }
    }
}
