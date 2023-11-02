<?php
require_once("../../include/initialize.php");

if (!isset($_SESSION['ADMIN_USERID'])) {
    redirect(web_root . "admin/index.php");
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
    case 'add':
        doInsert();
        break;

    case 'edit':
        doEdit();
        break;

    case 'delete':
        doDelete();
        break;

    default:
        // Handle other actions or display a default view
        break;
}

function doInsert()
{
    if (isset($_POST['save'])) {
        if ($_POST['IMAGE_URL'] == "") {
            message("Image URL is required!", "error");
            redirect('index.php?view=add');
        } else {
            $slides = new Slides();
            $slides->SLIDES = $_POST['IMAGE_URL'];
            $slides->create();

            message("New [" . $_POST['IMAGE_URL'] . "] slide created successfully!", "success");
            redirect("index.php");
        }
    }
}

function doEdit()
{
    if (isset($_POST['save'])) {
        $slides = new Slides();
        $slides->SLIDES = $_POST['IMAGE_URL'];
        $slides->update($_POST['ID']);

        message("[" . $_POST['IMAGE_URL'] . "] slide has been updated!", "success");
        redirect("index.php");
    }
}

function doDelete()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $slides = new Slides();
        $slides->delete($id);

        message("Slide has been deleted!", "info");
        redirect('index.php');
    }
}
