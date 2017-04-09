# CLTT

**C**ommand **L**ine **T**ime **T**racker.

### What is it?
A simple php command line utility to help you keep track of the shit you do all day.

### Features
* Add comments to timers as you work to help keep track of work done
* Edit times when you forget to start or stop timers
* Add new time entries on the fly
* Simple interface for browsing through your time entries
* Export timesheets as csv (pdf coming soon)
* Archive & restore projects anytime

### Setup
Clone the repo: `git clone git@github.com:badcrocodile/clitt.git`

Symlink cltt to somewhere in your $PATH: `ln -s /path/to/clitt/cltt /somewhere/in/your/path/cltt`

Initialize the database: `cltt`

Check the time that php-cli has loaded. Run this in a console, adjust as necessary: `php -r "echo strftime('%c');"`

### Usage
Create a project: `cltt add "Project Name"`

Archive a project: `cltt archive [ID]` or `cltt archive`

Restore a project: `cltt restore [ID]` or `cltt restore`

Show active projects: `cltt show`

Show archived projects: `cltt show -a, --archived`

Start a timer: `cltt start` or `cltt start [project ID]`

Add comments to the active timer: `cltt comment "Cleaning up database"`

See what project is currently being timed: `cltt running` or `cltt status`

Stop your timer: `cltt stop`

Add a new time entry: `cltt add-time`

Edit a time entry: `cltt edit [time entry ID]`. The format for the new time is pretty flexible. 11:32pm or 11:32 pm or 11:32PM or 11:32pm. It's all the same.

List entries for a specific project: `cltt times` or `cltt times [ID]`

List entries for the week: `cltt week`. Use the prompts to go back/forward in time.

List entries for any particular week: `cltt week "last week"` or `cltt week 4 weeks ago` or `cltt week "last year"`, etc

Export entries as csv: `cltt export` or `cltt export "last week"`, etc

### TODO

* Export to Google Docs
* User preferences
* Add comments to export file
* Add ability to start a project "x" minutes ago