*** Settings ***

Library         SeleniumLibrary
Library         String
Resource        ../resources/resources.robot
Suite Setup      Start Application
#Test Setup       Go To Register Form
Suite Teardown   Close Application

*** Test Cases ***

Should check Main Navbar Elements
          [Template]    Open Navbar Links Template
    Open Services link          ${Services_Navbar}      /products           Euroveloitus
    Open Values&Mission link    ${Values_Navbar}        /arvot-ja-missio    Arvot ja Missio
    Open Jobs link              ${Jobs_Navbar}          /rekry.phz.fi       Avoimet
    Open Contact link           ${Contact_Navbar}       /yhteystiedot       PHZ Full Stack Yhteystiedot
    Open eSports link           ${eSports_Navbar}       /team.phz.fi        Smash
    Open Apprien link           ${Apprien_Navbar}       /www.apprien.com    Game API
    Open PHZ Games link         ${Games_Navbar}         /gs.phz.fi          Forum

Should exercise Services dropdown
    Mouse Over               ${Services_Navbar}
    Open Navbar Links       ${SoftDev_Navbar}       /ohjelmistokehityspalvelut      Ohjelmistokehityspalvelut
    Mouse Over              ${Services_Navbar}
    Open Navbar Links       ${GuiDesign_Navbar}     /kayttoliittymasuunnittelu      palvelusuunnittelua


Should exercise Search functionality
    Click Element       class=searchform__input
    Input Text          class=searchform__input     Pharazon
    Press Keys          class=searchform__input     \\13
    Wait Until Page Contains    Hätinen

#Should count readlinks in Head section
#     Should Contain X Times     class=header      class=card__body    4





*** Keywords ***
Provided precondition
    Setup system under test



