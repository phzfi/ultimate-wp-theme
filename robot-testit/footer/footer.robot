*** Settings ***

Library         SeleniumLibrary
Library         String
Resource        ../resources/resources.robot
Suite Setup      Start Application
#Test Setup       Go to footer
#Test Setup       Close cookies disclaimer
Suite Teardown   Close Application

*** Test Cases ***



#Check footer links
#     Go to footer
#     Element Should Be Visible      class=basic-list__item.Tuotteet
#     Element Should Be Visible      class=basic-list__item.Työpaikat
#     Element Should Be Visible      class=basic-list__item.PHZ.Verkosto
#     Element Should Be Visible      class=basic-list__item.Apprien
#     Element Should Be Visible      class=basic-list__item.Facebook
#     Element Should Be Visible      class=basic-list__item.Instagram
#     Element Should Be Visible      class=basic-list__item.Twitter
#     Element Should Be Visible      class=basic-list__item.Yhteydenotto

Open footer links and go back
    Go to footer
    Open footer links   css=a.Facebook

#Should exercise footer links
#    [Tags]    DEBUG
#    Go to footer
#    Click Element        css=a.eSports
#    #Click Link        xpath=/html/body/footer/div/div[1]/div[2]/ul/li[1]/a    #link=/esports               #class=basic-list__item.eSports
#    Wait Until Page Contains Element        class=media-card__cover
#    Go Back
#    Wait Until Page Contains Element     class=footer

#Should open links in Nav bar
#    Click Link      class=navbar-item.Työpaikat
#    Wait Until Page Contains Element    class=hero-image
#    Go Back
#
#Should exercise Search functionality
#    Click Element       class=searchform__input
#    Input Text          class=searchform__input     Pharazon
#    Press Keys   class=searchform__input   \\13
#    Wait Until Page Contains    Hätinen
#
#Should count readlinks in Head section
#     Should Contain X Times     class=header      class=card__body    4
#
#



*** Keywords ***
Provided precondition
    Setup system under test
