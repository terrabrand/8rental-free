<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laravel Rental Management System</title>
</head>
<body>

<h1>Laravel Rental Management System</h1>

<img src="images/project_image.png" alt="Project Image">

<p>A comprehensive rental management system built with Laravel that allows you to manage tenants, rents, landlords, maintainers, properties, and units efficiently.</p>

<h2>Features</h2>
<ul>
  <li><strong>Tenant Management:</strong> Easily add, update, and remove tenants.</li>
  <li><strong>Rent Management:</strong> Keep track of rent payments and due dates.</li>
  <li><strong>Landlord Management:</strong> Manage information about landlords.</li>
  <li><strong>Maintainer Management:</strong> Track maintainers responsible for property maintenance.</li>
  <li><strong>Property Management:</strong> Add, edit, and view properties.</li>
  <li><strong>Unit Management:</strong> Manage individual units within properties.</li>
</ul>

<h2>Demo</h2>

<p>Check out the following YouTube video for a demonstration of the system:</p>

<div>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/4azHwDcenIU" frameborder="0" allowfullscreen></iframe>
</div>

<h2>Installation</h2>
<ol>
  <li>Clone the repository:
    <pre><code>git clone https://github.com/your_username/rental-management-system.git</code></pre>
  </li>
  <li>Navigate into the project directory:
    <pre><code>cd rental-management-system</code></pre>
  </li>
  <li>Install dependencies:
    <pre><code>composer install</code></pre>
  </li>
  <li>Create a copy of the <code>.env.example</code> file and rename it to <code>.env</code>. Update the necessary configurations (database connection, etc.):
    <pre><code>cp .env.example .env</code></pre>
  </li>
  <li>Generate an application key:
    <pre><code>php artisan key:generate</code></pre>
  </li>
  <li>Migrate the database:
    <pre><code>php artisan migrate</code></pre>
  </li>
  <li>Run the server:
    <pre><code>php artisan serve</code></pre>
  </li>
</ol>

<h2>Screenshots</h2>

<img src="images/screenshot1.png" alt="Screenshot 1">

<img src="images/screenshot2.png" alt="Screenshot 2">

<h2>Contributing</h2>
<p>Contributions are welcome! Please feel free to submit a pull request.</p>

<h2>License</h2>
<p>This project is licensed under the <a href="LICENSE">MIT License</a>.</p>

</body>
</html>
