# CLTT

## Command Line Time Tracker. 

Work in progress.

### Usage

Clone the repo: `git clone git@github.com:badcrocodile/clitt.git`

Symlink cltt to somewhere in your $PATH: `ln -s /path/to/clitt/cltt /somewhere/in/your/path/cltt`

Initialize the database: `cltt`

Check the time that php-cli has loaded. Run this in a console, adjust as necessary: `php -r "echo strftime('%c');"`

Create your first project: `cltt add "Project Name"`

See what projects you have active: `cltt show`

Start your timer: `cltt start`. This will list all projects available to you. If you know the ID of the project you'd like to work on, `cltt start [project ID]` will start the timer immediately.

Add comments to the project you're working on: `cltt comment "Cleaning up database"`

Stop your timer: `cltt stop`

See what project is currently being timed: `cltt running`

See your entries for a specific project: `cltt show-times` or cltt `show-times [ID]`

See what you've been working on for the week: `cltt week`. Use the prompts to go back/forward in time.

See what you've been working on for any particular week: `cltt week "last week"` or `cltt week 4 weeks ago` or `cltt week "last year"`, etc

Edit a time entry: `cltt edit [time entry ID]`. The format for the new time is pretty flexible. 11:32pm or 11:32 pm or 11:32PM or 11:32pm. It's all the same.

Export your time entries (exports to csv): `cltt export` or `cltt export "last week"`, etc

Archive a project: `cltt archive [ID]`

### TODO

* Export to Google Docs
* User preferences
* Add comments to export file
* Add ability to add entries on the fly
* Add ability to delete time entries
* Enhance `show-times`: If ran with no arguments show list of all projects, like `start`
