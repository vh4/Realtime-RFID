<?php

session_start();

session_reset();
session_unset();

header('Location:http://localhost/kantor/view/');