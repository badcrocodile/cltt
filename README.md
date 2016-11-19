# CLTT

## Command Line Time Tracker. 

Work in progress.

### Usage
Clone the repo `git clone git@github.com:badcrocodile/clitt.git`

Symlink project executable (cltt) to somewhere in your $PATH `ln -s /path/to/clitt/cltt /somewhere/in/your/path`

Initialize the database `cltt`

Create your first project `cltt add "Project Name"`

See what projects you have active: `cltt show`

Start your timer `cltt start` will list all projects available to you. If you know the ID of the project you'd like to work on, `cltt start 2` will start the timer immediately.

Add some comments to your running timer `cltt comment "Cleaning up database"`

Stop your timer `cltt stop`

See what project is currently being timed: `cltt running`

Edit a time entry (not fully implemented): `cltt edit [time entry ID]`

See your entries for a specific project: `cltt show-times` or cltt `show-times [ID]`

See what you've been working on for the week: `cltt week`. Use the prompts to go back/forward in time.

See what you've been working on for any particular week: `cltt week "last week"` or `cltt week 4 weeks ago` or `cltt week "last year"`, etc

Export your time entries (exports to csv): `cltt export` or `cltt export "last week"`, etc
