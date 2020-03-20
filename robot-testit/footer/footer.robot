*** Settings ***

Library         SeleniumLibrary
Library         String
Resource        ../resources/resources.robot
Suite Setup      Start Application
Test Setup       Go to footer
Suite Teardown   Close Application

*** Test Cases ***

#Check footer links
#     Go to footer
#     Element Should Be Visible      class=basic-list__item.Tuotteet


Should Check Footer Links
                                [Template]    Open footer links
    Open eSports link                ${eSport_link}         Smash
    Open Tuotteet link               ${Prods_link}          Euroveloitus
    Open Työpaikat link              ${Jobs_link}           Avoimet
    Open PHZ Verkosto link           ${PHZnet_link}         IT-konsultointitoimeksiannoista?
    Open Apprien link                ${Apprien_link}        Game API
    Open Facebook link               ${Facebook_link}       Full Stack Oy on Facebook
    Open Instagram link              ${Instagram_link}      Follow
    Open Twitter link                ${Twitter_link}        Tweets & replies
    Open Yhteydenotto link           ${Help_link}           Contact form
    Open Privacy link                ${Privacy_link}        PHZ.fi Privacy Policy
    Open Terms link                  ${Terms_link}          PHZ.fi Terms of Service


*** Keywords ***
Provided precondition
    Setup system under test
