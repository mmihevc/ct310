# Hospital Inpatient Prospective Payment System (IPPS) Charge Analysis Software – A CT310 Class Project

## Overview
Hospitals are often reimbursed by Medicaid for a procedure at a rate much less than the hospital bills and, sometimes, less than it costs the hospital to provide the care to the patient.  For this software, we will analyze these data by Provider and MS-DRG to provide insight into hospital reimbursement.
## The Data
We will use the FY2017 data from the Center for Medicare and Medicaid Services (CMS) IPPS files.  These files contain various columns, including columns that identify the Provider, the MS-DRG, and the Payment Details.  These three categories will work together to view the data from different perspectives.
# Pages in the System
## Home Page
You will come up with a company name and logo and create a home page.  This page will have navigation to other pages but will not contain any data or reports.  While you must create your own logo, you can use any properly cited image in your site to make it look professional.
## About Us/Who We Our/Our Team
On this page, you will have a picture, name, and bio for each of your team members along with a link to their deployment of the entire site.  (Yes, you each must host a fully working copy of the application on the due date)
## Hospital List
Simple a list of each hospital.  Must include Hospital Name, State, and MPN (Medicare’s 6-digit provider ID number, with leading zeros if needed).  This page uses a jQuery Tablesorter to allow a user to sort or filter by Name, MPN, State, and any other reasonable column that you included.
Clicking on a hospital’s name takes the user to a page for that hospital
## DRG List
Similar to the Hospital List page, except this page lists the MS-DRG Number and Description of each MS-DRG that has data in the dataset.  It can be filtered and sorted by either of these columns.
Clicking on a DRG Number takes the user to a page for that DRG
## Hospital Details Page
This is one Controller/Action that, when given a 6-digit MPN, shows a detailed report for the chosen hospital, including the rest of the details about that hospital (Such as address) that appear in the data set.  Also shown is a table for each DRG which has DRG Number, DRG Description, and the three payment amount columns.
Clicking on a DRG Number takes the user to a page for that DRG
## DRG Details Page
This page shows details for a given DRG and has a table with each Hospital, including the MPN, Name, and State along with the three payment amount columns.
# Implementation Details
## Application makes extensive use of Fuel PHP
The application is entirely MVC in Fuel PHP, no static pages.  Pages use templates for navigation and other common elements and are designed and implemented to be as generic as possible.
It is up to the group how the different pages are broken up into controllers and actions, provided the actions are parameterized for MPN and DRG for the respective detail pages.
The application will use no fewer than 3 models, Hospital, DRG, and Payment, which will read the respective data using the fuel model search commands.  At this stage, the models will read from a one or more files.  
# Team Dynamics
Teams are expected to work together to complete the assignment for a Team Score.  However, the instructor reserves the right to assign a different score to each team member, if warranted.  Teams facing team dynamics issues are expected to contact the instructor as soon as these issues being and keep in contact about them.  
# Team Assignment
## Team Composition
A team is composed of 1-4 members.  Teams are formed by the students.  The project is designed to be a decent amount of work and will be challenging for teams of 1 or 2, yet teams of 4 might find a different challenge is coordinating team logistics.
Students will form their teams in the groups section of Canvas.  Student can add themselves to a team or to one of the special groups to be randomly paired or to request to work alone.  Students requesting to work alone must present their case to the instructor about why they desire to work alone and must commit to essentially a double workload for the remainder of the semester.  This request will be granted at the discretion of the instructor.  Otherwise, any students not on a team will be randomly assigned to form new teams.
