<!DOCTYPE html>
<html>
  <head>
    <title>Car {{ $land->land_ID }}</title>
  </head>
  <body>
    <h1>land {{ $land->land_ID }}</h1>
    <ul>
      <li>Country: {{ $land->landName }}</li>
      <li>Short name: {{ $land->landKurz }}</li>
      <li>Id: {{ $land->land_ID }}</li>
    </ul>
  </body>
</html>