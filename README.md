# CLTT

**C**ommand **L**ine **T**ime **T**racker.

![cltt status](http://coolguy.org/screengrab/cltt-overview1.gif)


![cltt status](http://coolguy.org/screengrab/status2.gif)

### What is it?
A simple cli utility for keeping track of all the shit you do during your day.

At its core it's a way to respond intelligently the next time your PM asks "What have you been working on today?" 
Drop into your terminal, run `cltt day`, and have a solid answer. Or even tougher, "What did you do yesterday?" 
Answer: `cltt day yesterday`. 

It has a number of tools for browsing through your days and weeks, and you can easily export your timesheets with a single command.

### What can it do?

#### Basic usage:
* Create a project: `cltt add "Cltt Widgets"`
* Start a timer: `cltt start`
* Forget to start a timer? No problem: `cltt start [project ID] "45 minutes ago"`
* Add some comments to the timer you are working on: `cltt comment "Working on feature A"`
* Stop a timer: `cltt stop`
* Forget to stop a timer? No problem: `cltt stop "2 hours ago"`
* Forget to log some times yesterday (or even last week)? Add new time entries on the fly `cltt add-time` and follow the prompts

#### Browsing:
##### What have I done today (or X days ago)?
* See what you've done today: `cltt day`
* See what you did yesterday `cltt day yesterday`
* See what you did X number of days ago `cltt day "4 days ago`
* `cltt day` also supports pagination for you to browse through your days.

##### What have I done this week (or X weeks ago)?
* See what you've done for the current week: `cltt week`
* See what you did last week `cltt day week "last week"`
* See what you did X number of weeks ago `cltt week "4 weeks ago"`
* `cltt week` also supports pagination for you to browse through your weeks.

##### Exporting timesheets
* Export timesheet for current week: `cltt export` 
* Export timesheet for X weeks ago: `cltt export "last week"` 

##### Other stuff you can do
* Display all available commands: `cltt list`
* Get help on a specific command: `cltt help add-time`
* Show all times logged for a specific project: `cltt times`
* Archive & restore projects: `cltt archive` and `cltt restore`

### How do I use it?
**Clone the repo:** `git clone git@github.com:badcrocodile/clitt.git`

**Symlink cltt to somewhere in your $PATH:** `ln -s /path/to/clitt/cltt /somewhere/in/your/path/cltt`

**Initialize the database:** `cltt`

**Check the time that php-cli extension is available by running this in a console, adjust as necessary:** `php -r "echo strftime('%c');"`

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

**Export entries:** `cltt export` or `cltt export "last week"`, etc
* You can also use the `cltt week` interface to browse back and forth and execute the 'Export' command (e) from the displayed week.

### TODO

* User preferences (timezones, export file location)
* Export to Google Sheets?
* Desktop notifications
