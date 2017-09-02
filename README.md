# CLTT

**C**ommand **L**ine **T**ime **T**racker.

### What is it?
A simple php command line utility to help you keep track of the shit you do all day.

### Highlights
* Create unlimited projects: `cltt add "Acme Widgets"`
* Start tracking time: `cltt start`
* Forget to start a timer? No problem: `cltt start [project ID] "45 minutes ago"`
* Forget to stop a timer? No problem: `cltt stop "2 hours ago"`
* Add comments to the task you are working on: `cltt comment "Working on feature A"`
* Show all times logged for a specific project: `cltt times`
* Add new time entries on the fly `cltt add-time` and follow the prompts
* See what you've done today: `cltt day`
* See what you did yesterday `cltt day yesterday`
* See what you did X number of days ago `cltt day "4 days ago`
* See what you've done for the current week: `cltt week`
* See what you did last week `cltt day week "last week"`
* See what you did X number of weeks ago `cltt week "4 weeks ago`
* Export timesheet for current week as csv (pdf coming soon): `cltt export` 
* Export timesheet for X weeks ago: `cltt export "last week"` 
* Archive & restore projects anytime `cltt archive` and `cltt restore`

### Setup
Clone the repo: `git clone git@github.com:badcrocodile/clitt.git`

Symlink cltt to somewhere in your $PATH: `ln -s /path/to/clitt/cltt /somewhere/in/your/path/cltt`

Initialize the database: `cltt`

Check the time that php-cli has loaded. Run this in a console, adjust as necessary: `php -r "echo strftime('%c');"`

### Usage
**Create a project:** `cltt add` or `cltt add "Project Name"`

**Start a timer:** `cltt start` or `cltt start [project ID]`.<br>
* Forget to start a timer? Pass a 3rd argument representing when the timer should have been started: `cltt start [project ID] "15 minutes ago"`. 
* Any time that can be parsed by php's [strtotime](http://php.net/manual/en/function.strtotime.php) function will work.

**Add comments to the active timer:** `cltt comment "Cleaning up database"`

**Stop your timer:** `cltt stop`.
* Forget to stop a timer? Pass a second argument representing when the timer should have been stopped: `cltt stop "1 hour ago"`
* Any time that can be parsed by php's [strtotime](http://php.net/manual/en/function.strtotime.php) will work.

**Edit a time entry:** `cltt edit [time entry ID]`.
* Retrieve a list of time entry ID's using `cltt times`
* The format for the new time is pretty flexible. 11:32pm or 11:32 pm or 11:32PM or 11:32pm. It's all the same.

**Archive a project:** `cltt archive [ID]` or `cltt archive`

**Restore a project:** `cltt restore [ID]` or `cltt restore`

**Show active projects:** `cltt show`

**Show archived projects:** `cltt show -a, --archived`

**See what project is currently being timed:** `cltt running` or `cltt status`

**Add a new time entry on-the-fly:** `cltt add-time`

**List entries for a specific project:** `cltt times` or `cltt times [ID]`

**List entries for the day:** `cltt day`
* A second parameter can be used to specify which day. Examples being "yesterday", "last saturday", etc
* Use the prompts to go back/forward in time.
* 'e' will export the currently displayed day timesheet

**List entries for the week:** `cltt week`
* A second parameter can be used to specify which day/week. Examples being "last week", "2 weeks ago", etc
* Use the prompts to go back/forward in time.
* 'e' will export the currently displayed week timesheet

**Export entries as csv:** `cltt export` or `cltt export "last week"`, etc
* You can also use the `cltt week` interface to browse back and forth and execute the 'Export' command (e) from the displayed week.

### TODO

* User preferences (timezones, export file location)
* Export to Google Sheets?
