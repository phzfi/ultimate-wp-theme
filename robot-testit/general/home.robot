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
    Search Text in Page     ${Search_Navbar}    Pharazon    Hätinen


Should Exercise Responsive Burger-menu Links
      [Template]    Open Burger-menu Links
    Open Values&Mission link    ${Values_Navbar}        /arvot-ja-missio    Arvot ja Missio
    Open Jobs link              ${Jobs_Navbar}          /rekry.phz.fi       Avoimet
    Open Contact link           ${Contact_Navbar}       /yhteystiedot       PHZ Full Stack Yhteystiedot
    Open Services link           ${Services_Navbar}      /products           Euroveloitus
    Open eSports link           ${eSports_Navbar}       /team.phz.fi        Smash
    Open Apprien link           ${Apprien_Navbar}       /www.apprien.com    Game API
    Open PHZ Games link         ${Games_Navbar}         /gs.phz.fi          Forum


#Should count readlinks in Head section
#     Should Contain X Times     class=header      class=card__body    4





*** Keywords ***
Provided precondition
    Setup system under test



