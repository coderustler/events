# events
A Laravel 5.5 FullCalendar drag and drop implementation

<p>You can use this code as a start to a Laravel 5.5, FullCalendar drag and drop application</p>
<p>It pulls in <a href="https://fullcalendar.io/">FullCalendar</a> and <a href="https://github.com/t4t5/sweetalert">SweetAlert</a> via CDN</p>
<p>To install as a stand alone application (The following is using xampp on windows localhost):</p>
<p>It includes full CRUD with dummy seed data in March 2018 for example purposes. It uses MySQL in this example</p>
<p>The following instructions assume a working knowledge of Composer and Laravel:</p>

<p>git clone https://github.com/coderustler/events.git</p>
<p>cd to: events</p>
<p>Run: composer update</p>
<p>Create a blank database: events</p>
<p>Windows run: copy .env.example .env or if Linux run: cd .env.example .env</p>
<p>Run: php artisan key:generate</p>
<p>Edit .env file database constants and url per your specifications, per this example: APP_URL=http://localhost:8000</p>
<p>Run: php artisan migrate</p>
<p>Run: php artisan db:seed</p>
<p>Run: php artisan:serve</p>
<p>Point browser to http://127.0.0.1:8000/events</p>
<p>You can create, read, update, destroy calendar events</p>




