#LeadTheBoard!

##Installation 

To install LeadTheBoard, set up an empty MySQL database and enter the database credentials in config.php, then run /installer.php in a browser and follow the instructions.

(Sample data is inserted into the database currently for testing)

##About

LeadTheBoard! is a web site designed to be used in the classroom to improve student's work by providing a competitive incentive in the form of completing Achievements, Quests, and getting XP, with the challenge to reach the top of the central leaderboard of the class.

The teacher has admin control over the classes they teach, allowing them to create new classes, edit existing ones, add and remove students and edit students details. Certain types of data can be imported from and exported to Google Sheets, e.g. grades and attendance records, which can be used by the system to award achievements automatically.

What achievements are unlockable can be set by the teacher and can be different for each class they teach. Achievements consist of a picture, achievement name, description (how they can be unlocked), and the amount of XP that is earned from unlocking it. In addition to a default set, the teacher can create new achievements, however custom achievements will initally only be able to be unlocked manually by the teacher for a student. In the future functionality will be added for automatic unlock using an 'if condition met' system that the teacher can set. 

Quests are similar to achievements but are time based and focused on tasks such as completeing an assignment on time. Because of their limited availablity this gives the incentive to the students to get the task done in the time given. 

XP will be calculated by the XP award given on attendance, achievements and quests, and additonal XP can be given by the teacher individually to students or clans as rewards. 

The leaderboard will display each student's position on the board, avatar, name, and the number of achievements and quests they've completed, as well as their XP total. By default, XP will be used to determine the position of a student on a leaderboard, but this can be changed so that number of achievements or quests completed will determine it. 

Each student will have a profile that allows them to upload an avatar (profile picture), set their accent colour which will be reflected across the site when they are logged in, and join a clan.

Also in the future there is a possibility of adding a Clan Wars feature, in which the teacher can set a task for clans to complete, and the first clan to do so gets a reward.


## Intended Fuctionality 

###### Teacher Functionality
- Create account
- Edit personal login details
- Create new, edit, delete classes
- Add students manually or from a Google Sheet (Possibly upload spreadsheet in future), edit (avatar, clan, etc.), or delete students
- Import other data from a Google Sheet automatically (Possibly upload spreadsheet in future)
- Create, edit, delete custom achievements
- Edit preset achievements (XP Value, availability)
- Create, edit, delete Quests
- Give XP to a student (+/-)
- Change what leaderboard positioning is based on (XP, achievements unlocked, quests completed)
- View leaderboard, activity feed, available Quests and Achievemetns

###### Student Functionality
- Upload avatar
- Create, Join, and edit a clan (Including clan avatar)
- View leaderboard, activity feed, available Quests and Achievements
- Edit personal login details



## Concept images
![alt tag](https://raw.githubusercontent.com/KingDingDan/LeadTheBoard/master/assets/studentMainViewMock.png)
