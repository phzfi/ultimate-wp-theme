*** Settings ***

Library         SeleniumLibrary
Library         String
Resource        ../resources/resources.robot
#Test Setup       Go To Register Form
Suite Setup      Start Application
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







*** Keywords ***
Provided precondition
    Setup system under test



