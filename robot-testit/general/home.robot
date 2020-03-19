*** Settings ***

Library         SeleniumLibrary
Library         String
Resource        ../resources/resources.robot
Suite Setup      Start Application
#Test Setup       Go To Register Form
Suite Teardown   Close Application

*** Test Cases ***

Should close Cookies disclaimer
    Close cookies disclaimer

Should check GUI elements
    [Tags]    DEBUG
    Element Should Be Visible                class=navbar__logo            #xpath=/html/body/nav/div[1]/a[1]/img
    Element Should Be Visible       class=navbar-item.Palvelut
    Element Should Be Visible       class=navbar-item.Arvot
    Element Should Be Visible       class=navbar-item.Työpaikat
    Element Should Be Visible       class=navbar-item.Yhteystiedot
    Element Should Be Visible       class=navbar-item.eSports
    Element Should Be Visible       class=navbar-item.Apprien
    Element Should Be Visible       class=navbar-item.PHZ.Game.Studios

Should open links in Nav bar
    Click Link      class=navbar-item.Työpaikat
    Wait Until Page Contains Element    class=hero-image
    Go Back

Should exercise Search functionality
    Click Element       class=searchform__input
    Input Text          class=searchform__input     Pharazon
    Press Keys   class=searchform__input   \\13
    Wait Until Page Contains    Hätinen

Should count readlinks in Head section
     Should Contain X Times     class=header      class=card__body    4





*** Keywords ***
Provided precondition
    Setup system under test



