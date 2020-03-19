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

Go to footer
    Scroll Element Into View      class=footer

Open footer links   [Arguments]   ${footer_link}
    Wait Until Element Is Visible      class=footer
    Click Element        ${footer_link}
    #Wait Until Page Contains Element        class=media-card__cover
    Go Back
    Wait Until Page Contains Element     class=footer



        Click Element        css=a.eSports
        #Click Link        xpath=/html/body/footer/div/div[1]/div[2]/ul/li[1]/a    #link=/esports               #class=basic-list__item.eSports
        Wait Until Page Contains Element        class=media-card__cover
        Go Back
        Wait Until Page Contains Element     class=footer





My Foo Bar Keyword
    [Documentation]    Does so and so
    [Arguments]        ${arg1}
    Do this
    Do that
    [Return]           Some value
