KW E-Sports Gaming Society

Database Priveleges: connection.php
$servername = "localhost";
$username = "kaiwah";
$password = "123456";
$dbname = "kaiwah";



Member username: 21WMD04035
member passsword: 123456

Member page flow

login.php = for admin and member to login. For member it is able to create account. 
=====================================================================================================================================================================================
member.php = for member to create account and log in 

=====================================================================================================================================================================================
stafflogin.php = after clicking staff login from login.php, it will direct to staff login page 

=====================================================================================================================================================================================
homepage.php = the landing page of our website

=====================================================================================================================================================================================
aboutus.php = a small description of KW Esports society

=====================================================================================================================================================================================
event2.php = A list events for user to view on 

=====================================================================================================================================================================================
joinevent.php = A registration form for member who has already logged on to register events 

=====================================================================================================================================================================================
profile.php = for member to view on the details of their profile and edit at the same time. Moreover, at he bottom of the page it will show the tournament history of the member 

=====================================================================================================================================================================================
=====================================================================================================================================================================================
=====================================================================================================================================================================================





=========================================================
ADMIN PAGE FLOW
=========================================================
Admin page:
Login.php : 
To login, please enter

ID = 21WMD00346
Pass = fungpin123
=========================================================

Indexstaff.php
Show available events 
Navigates through sidenav to different pages

=========================================================
Booking

Booking.php
Show all bookings made from member
Booking number is auto increment

Can:
Edit and Delete exisitng booking

=========================================================
Events

Listevent.php
Show all the events that are created

Can:
Create,Edit and Delete event

createevent.php
Create event by entering event name, game name...

createsuccessful.php
Show create successful message and event details

editevent.php
Can change all of the field except event name

editsuccesful.php
Show edit successful message and edited details

deleteevent.php
Recap and confirm deletion

deletesuccessful.php
Show delete successful message and deleted event details

=========================================================
Announcement

Announcement.php
Show online announcement available

createannoucement.php
Create annoucement by entering title,content,date and by whom, Show create successful after creating in same page

deleteAnnouncement.php
Recap and confirm deletion

deleted.php
Show delete successfully message

=========================================================
Profile

Adminprofile.php
Show admin details like name nric..
includes edit function

editadminprofile.php
allow admin to make changes for all attributes except for admin ID/student ID

updateProfile.php
Show update successful message and details that are changed

=========================================================
Log out

Logout.php
Destroy and unset session 
Redirects to login.php

=========================================================