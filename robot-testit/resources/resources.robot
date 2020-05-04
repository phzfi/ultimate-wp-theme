*** Settings ***


*** Variables ***
${browser}          Chrome
${APP_URL}        	https://phz.fi/
${DELAY}         	0

# GUI variables
${Site_title}       Etusivu - PHZ Full Stack Oy
${Main_Navbar}      id=main-navbar
${Logo_Navbar}                class=navbar__logo
${Services_Navbar}       xpath=//*[@id="main-navbar"]/div[1]/div/a    #class=navbar-item.Palvelut
${SoftDev_Navbar}     xpath=//*[@id="main-navbar"]/div[1]/div/div/a[1]
${GuiDesign_Navbar}     xpath=//*[@id="main-navbar"]/div[1]/div/div/a[2]
${Values_Navbar}       class=navbar-item.Arvot
${Jobs_Navbar}       class=navbar-item.Työpaikat
${Contact_Navbar}       class=navbar-item.Yhteystiedot
${eSports_Navbar}       class=navbar-item.eSports
${Apprien_Navbar}       class=navbar-item.Apprien
${Games_Navbar}       class=navbar-item.PHZ.Game.Studios
${Search_Navbar}      class=searchform__input
${Burger_Navbar}     class=navbar-burger
${Cookies_Btn}      class=easy-cookies-policy-accept
${eSport_link}      xpath=/html/body/footer/div/div[1]/div[2]/ul/li[1]/a
${Prods_link}       xpath=/html/body/footer/div/div[1]/div[2]/ul/li[2]/a
${Jobs_link}        xpath=/html/body/footer/div/div[1]/div[2]/ul/li[3]/a
${PHZnet_link}      xpath=/html/body/footer/div/div[1]/div[2]/ul/li[4]/a
${Apprien_link}     xpath=/html/body/footer/div/div[1]/div[3]/ul/li/a
${Facebook_link}    xpath=/html/body/footer/div/div[1]/div[4]/ul/li[1]/a
${Instagram_link}   xpath=/html/body/footer/div/div[1]/div[4]/ul/li[2]/a
${Twitter_link}     xpath=/html/body/footer/div/div[1]/div[4]/ul/li[3]/a
${Help_link}        xpath=/html/body/footer/div/div[1]/div[5]/ul/li/a
${Smash_tab}         class=navbar-item.Smash
${Footer_section}    class=footer
${Privacy_link}                    xpath=/html/body/footer/div/div[3]/div[2]/a[1]
${Terms_link}       xpath=/html/body/footer/div/div[3]/div[2]/a[2]
#Careers
${NameJob_field}      id=input_1_1
${EmailJob_field}      id=input_1_3
${PhoneJob_field}      id=input_1_4
${LinkedinJob_field}      id=input_1_5
${ChooseFile_btn}      id=input_1_6
${SubmitJob_btn}      id=gform_submit_button_1



*** Keywords ***

Start Application
    [Tags]    DEBUG
    Open Browser    ${APP_URL}    ${browser}
    Maximize Browser Window
    Set Selenium Speed  ${DELAY}
    Wait Until Page Contains Element    ${main_navbar}
    Close cookies disclaimer
    Title Should Be   ${Site_title}

Close Application
    Close All Browsers

Close cookies disclaimer
    Wait Until Element Is Visible   ${Cookies_Btn}
    Click Element       ${Cookies_Btn}
    Wait Until Element Is Not Visible        ${Cookies_Btn}

Go to footer
    Scroll Element Into View      ${Footer_section}

Open Navbar Links Template
    [Arguments]     ${TestDescription}     ${navbar_link}   ${target_url}  ${target_obj}
    Open Navbar Links   ${navbar_link}   ${target_url}  ${target_obj}

Open Navbar Links
    [Arguments]    ${navbar_link}   ${target_url}  ${target_obj}
    Wait Until Element Is Visible      ${Main_Navbar}
    Click Element               ${navbar_link}
    Location Should Contain     ${target_url}
    Wait Until Page Contains    ${target_obj}
    Go Back
    Wait Until Page Contains Element     ${Main_Navbar}

Open Burger-menu Links
    [Arguments]     ${TestDescription}   ${burger_link}   ${target_url}  ${target_obj}
    Set Window Size	    800	    600
    Wait Until Page Contains Element   ${Burger_Navbar}
    Click Element       ${Burger_Navbar}
    Click Element       ${burger_link}
    Location Should Contain     ${target_url}
    Wait Until Page Contains    ${target_obj}
    Go Back



Search Text In Page
     [Arguments]     ${search_locator}     ${search_term}     ${found_term}
    Click Element       ${search_locator}
    Input Text          ${search_locator}     ${search_term}
    Press Keys          ${search_locator}     \\13
    Wait Until Page Contains    ${found_term}


Open footer links
    [Arguments]     ${TestDescription}     ${footer_link}     ${target_obj}
    Wait Until Element Is Visible      ${Footer_section}
    Click Element        ${footer_link}
    Wait Until Page Contains     ${target_obj}
    Go Back
    Wait Until Page Contains Element     ${Footer_section}


My Foo Bar Keyword
    [Documentation]    Does so and so
    [Arguments]        ${arg1}
    Do this
    Do that
    [Return]           Some value

Go To Careers Page
    Click Element       ${jobs_navbar}
    Wait Until Element Is Visible       ${Submitjob_btn}
