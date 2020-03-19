*** Settings ***


*** Variables ***
${browser}          Chrome
${APP_URL}        	https://phz.fi/
${DELAY}         	0

# GUI variables
${Main_Navbar}      id=main-navbar
${Cookies_Btn}      class=easy-cookies-policy-accept




*** Keywords ***

Start Application
    [Tags]    DEBUG
    Open Browser    ${APP_URL}    ${browser}
    Maximize Browser Window
    Set Selenium Speed  ${DELAY}
    Wait Until Page Contains Element    ${main_navbar}
    Title Should Be   Etusivu - PHZ.FI - Kestävän elinkaaren ohjelmistokehitys

Close Application
    Close All Browsers

Close cookies disclaimer
    Wait Until Element Is Visible   ${Cookies_Btn}
    Click Element       ${Cookies_Btn}
    Wait Until Element Is Not Visible        ${Cookies_Btn}


My Foo Bar Keyword
    [Documentation]    Does so and so
    [Arguments]        ${arg1}
    Do this
    Do that
    [Return]           Some value

