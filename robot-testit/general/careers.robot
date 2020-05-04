*** Settings ***

Library         SeleniumLibrary
Library         String
Resource        ../resources/resources.robot
Suite Setup      Start Application
Test Setup       Go to Careers Page
Suite Teardown   Close Application

*** Test Cases ***

Should Reject Empty Open Application
    Click Element   ${Submitjob_btn}
    Wait Until Page Contains    Vähintään
    #Input text      ${namejob_field}

Should Submit Open Application
Should Upload File in Open Application

Should Reject Empty Application
Should Submit Open Application
Should Upload File in Open Application



*** Keywords ***
Provided precondition
    Setup system under test
