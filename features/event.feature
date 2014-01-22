Feature: Creating an event

  Background:
    Given I visit the login page
    When I fill in "username" with "admin"
    When I fill in "passwd" with "admin"
    When I click on "Log in"
    Then I should see "Control Panel"
    When I click on "Components" in the menu
    When I click on "events" in the menu
    Then I should be at "/index.php?option=com_events&view=venues"

  Scenario Outline: Create a main event
    When I click on the link "Events" in the left menu
    When I click on "New" in the toolbar
    Then I should be at "/index.php?option=com_events&view=event"
    When I fill in "title" with <title>
    When I fill in "subtitle" with <subtitle>
    When I choose <event-type> as "Event Type"
    When I click on "Save" in the toolbar
    Then I should be at "/index.php?option=com_events&view=events"
    Then I should see <title> in the list
    When I click on <title>
    Then I should see <title> at "title"
    Then I should see <slug> at "slug"
    Then I should see <subtitle> at "subtitle"
    Then I should see <event-type> selected at "Event Type"

    Examples:
      | title     | slug      | subtitle                                     | event-type   |
      | "Pinkpop" | "pinkpop" | "Nederlands oudste en bekendste popfestival" | "Main Event" |

  Scenario Outline: Creating a venue
    When I click on the link "Venues" in the left menu
    When I click on "New" in the toolbar
    Then I should be at "/index.php?option=com_events&view=venue"
    When I fill in "title" with <title>
    When I fill in "address" with <address>
    When I fill in "zipcode" with <zipcode>
    When I fill in "city" with <city>
    When I fill in "region" with <region>
    When I fill in "country" with <country>
    When I choose <event> as "Event"
    When I fill in the editor "fulltext" with <fulltext>
    When I click on "Save" in the toolbar
    Then I should see <title> in the list
    When I click on <title>
    Then I should see <title> at "title"
    Then I should see <slug> at "slug"
    Then I should see <address> at "address"
    Then I should see <zipcode> at "zipcode"
    Then I should see <city> at "city"
    Then I should see <region> at "region"
    Then I should see <country> at "country"
    Then I should see <event> selected at "Event"
    Then I should see <fulltext> at the editor "fulltext"

    Examples:
      | title                     | slug                      | address     | zipcode  | city         | region    | country     | event     | fulltext |
      | "Pinkpop festivalterrein" | "pinkpop-festivalterrein" | "het adres" | "1111AA" | "Landgraaf"  | "Limburg" | "Nederland" | "Pinkpop" | "Pinkpop vindt plaats in het Pinksterweekend op 7-8-9 juni 2014. Het festival zal in 2014 voor de 45ste keer plaatsvinden, een uniek record. Sinds 1990 is Pinkpop opgenomen in het Groot Guinness Book Of Records als het oudste onafgebroken georganiseerde popfestival in Nederland, (maar volgens velen zelfs van Europa). Pinkpop wordt mede mogelijk gemaakt dankzij de bereidwillige medewerking van de gemeente Landgraaf en haar inwoners. De organisatie bedankt alle medewerkers, vrijwilligers en leveranciers voor hun inzet. De eerste editie vond plaats op 18 mei 1970 in Geleen, waar Pinkpop 17 keer werd gehouden. In 1987 werd eenmalig uitgeweken naar Baarlo. Vanaf 1988 wordt Pinkpop gehouden op evenemententerrein Megaland in de gemeente Landgraaf en zal daar in 2014 voor de 27ste keer plaatsvinden." |

  Scenario Outline: Creating a room
    When I click on the link "Rooms" in the left menu
    When I click on "New" in the toolbar
    Then I should be at "/index.php?option=com_events&view=room"
    When I fill in "title" with <title>
    When I choose <venue> as "Venue"
    When I click on "Save" in the toolbar
    Then I should see <title> in the list
    When I click on <title>
    Then I should see <title> at "title"
    Then I should see <slug> at "slug"
    Then I should see <venue> selected at "Venue"

  Examples:
      | title        | slug         | venue                     |
      | "3FM stage"  | "3fm-stage"  | "Pinkpop festivalterrein" |
      | "Main stage" | "main-stage" | "Pinkpop festivalterrein" |