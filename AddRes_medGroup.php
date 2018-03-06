<?php
// URL to scrape
  $url = "https://baycare.org/bmg?hcmacid=a0Z1a00000451ssEAA";

// SCRAPER
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  $data = curl_exec($curl);

  curl_close($curl);

// CHANGE PROBLEMATIC STRINGS
  $data = str_replace('href="/', 'href="https://baycare.org/', $data);
  $data = str_replace('<h2', '<h3', $data);
  $data = str_replace('</h2>', '</h3>', $data);
  $data = str_replace('<h1', '<h3', $data);
  $data = str_replace('</h1>', '</h3>', $data);

// BREAK SCRIPTS
// strips all tags EXCEPT for tags listed to the right (second input). if it's removed from
// the second input, it's going to be stripped.
  $data = strip_tags($data, "<span><a><p><br><hr><h1><h2><h3><h4><h5><h6><div><ul><li>");

// ECHO DATA TO JS SCRIPT IN HTML FILE
  echo "loadData(".json_encode($data).")";
?>
