<?php
include_once "include/connection.php";

if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else {
    $page = "home";
}

if(file_exists("pages/".$page.".php")) {
    $data = array();
    $data['page'] = $page;
    if ($page == "branch") {
        $result = $db->select("branch");
        if ($result != 0) {
            if (is_array($result[0]))
                $data['branch'] = $result;
            else $data['branch'][0] = $result;
        } else {
            $data['branch'] = 0;
        }
    } else if ($page == "client") {
        $result = $db->select("client");
        if ($result != 0) {
            if (is_array($result[0]))
                $data['client'] = $result;
            else $data['client'][0] = $result;
        } else {
            $data['client'] = 0;
        }
    } else if ($page == "privateowner") {
        $result = $db->select("privateowner");
        if ($result != 0) {
            if (is_array($result[0]))
                $data['privateowner'] = $result;
            else $data['privateowner'][0] = $result;
        } else {
            $data['privateowner'] = 0;
        }
    } else if ($page == "propertyforrent") {
        $result = $db->select("propertyforrent");
        if ($result != 0) {
            if (is_array($result[0]))
                $data['propertyforrent'] = $result;
            else $data['propertyforrent'][0] = $result;
        } else {
            $data['propertyforrent'] = 0;
        }
    } else if ($page == "registration") {
        $result = $db->select("registration");
        if ($result != 0) {
            if (is_array($result[0]))
                $data['registration'] = $result;
            else $data['registration'][0] = $result;
        } else {
            $data['registration'] = 0;
        }
    } else if ($page == "staff") {
        $result = $db->select("staff");
        if ($result != 0) {
            if (is_array($result[0]))
                $data['staff'] = $result;
            else $data['staff'][0] = $result;
        } else {
            $data['staff'] = 0;
        }
    } else if ($page == "viewing") {
        $result = $db->select("viewing");
        if ($result != 0) {
            if (is_array($result[0]))
                $data['viewing'] = $result;
            else $data['viewing'][0] = $result;
        } else {
            $data['viewing'] = 0;
        }
    } else if ($page == "edit_branch") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($db->select("branch", "*", "branchNo = '" . $id . "'") != 0) {
                $data['method'] = "edit";
                $data['branch'] = $db->select("branch", "*", "branchNo = '" . $id . "'");
                $data['branch']['id'] = $data['branch']['branchNo'];
            } else {
                $data['method'] = "add";
            }
        } else {
            $data['method'] = "add";
        }
    } else if ($page == "edit_client") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($db->select("client", "*", "clientNo = '" . $id . "'") != 0) {
                $data['method'] = "edit";
                $data['client'] = $db->select("client", "*", "clientNo = '" . $id . "'");
                $data['client']['id'] = $data['client']['clientNo'];
            } else {
                $data['method'] = "add";
            }
        } else {
            $data['method'] = "add";
        }
    }
    else if ($page == "edit_owner") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($db->select("privateowner", "*", "ownerNo = '" . $id . "'") != 0) {
                $data['method'] = "edit";
                $data['owner'] = $db->select("privateowner", "*", "ownerNo = '" . $id . "'");
                $data['owner']['id'] = $data['owner']['ownerNo'];
            } else {
                $data['method'] = "add";
            }
        } else {
            $data['method'] = "add";
        }
    }
    else if ($page == "edit_property") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($db->select("propertyforrent", "*", "propertyNo = '" . $id . "'") != 0) {
                $data['method'] = "edit";
                $data['property'] = $db->select("propertyforrent", "*", "propertyNo = '" . $id . "'");
                $data['property']['id'] = $data['property']['propertyNo'];
            } else {
                $data['method'] = "add";
            }
        } else {
            $data['method'] = "add";
        }
    }
    else if ($page == "edit_registration") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($db->select("registration", "*", "id = '" . $id . "'") != 0) {
                $data['method'] = "edit";
                $data['registration'] = $db->select("registration", "*", "id = '" . $id . "'");
                $data['registration']['id'] = $data['registration']['No'];
            } else {
                $data['method'] = "add";
            }
        } else {
            $data['method'] = "add";
        }
    }
    else if ($page == "edit_staff") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($db->select("staff", "*", "staffNo = '" . $id . "'") != 0) {
                $data['method'] = "edit";
                $data['staff'] = $db->select("staff", "*", "staffNo = '" . $id . "'");
                $data['staff']['id'] = $data['staff']['No'];
            } else {
                $data['method'] = "add";
            }
        } else {
            $data['method'] = "add";
        }
    }
    else if ($page == "edit_viewing") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($db->select("viewing", "*", "id = '" . $id . "'") != 0) {
                $data['method'] = "edit";
                $data['viewing'] = $db->select("viewing", "*", "id = '" . $id . "'");
                $data['viewing']['id'] = $data['viewing']['No'];
            } else {
                $data['method'] = "add";
            }
        } else {
            $data['method'] = "add";
        }
    }
}
else {
    $page = "404";
}
include_once "pages/sections/header.php";
include_once "pages/".$page.".php";
include_once "pages/sections/footer.php";