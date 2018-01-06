<?php

/**
 * Form Tools API
 * --------------
 *
 * This file is provided for backward compatibility only for users who are using the API 1.x versions and want to
 * upgrade to Form Tools 3. It contains wrapper methods with the old function methods that now call the new API class
 * methods.
 *
 * Please don't use this file! It will be dropped at some point. Use the API.class.php methods directly.
 *
 * Documentation:
 * https://docs.formtools.org/api/
 */

require_once("API.class.php");

use FormTools\API;
use FormTools\Core;

//$g_api_version = API::getVersion(); // TODO
//$g_api_recaptcha_error = null; // TODO

// wrapper functions for the new API class methods
function ft_api_get() {
    return new API();
}

function ft_api_show_submissions($form_id, $view_id, $export_type_id, $page_num = 1, $options = array()) {
    $api = ft_api_get();
    return $api->showSubmissions($form_id, $view_id, $export_type_id, $page_num, $options);
}

function ft_api_show_submission($form_id, $view_id, $export_type_id, $submission_id) {
    $api = ft_api_get();
    $api->showSubmission($form_id, $view_id, $export_type_id, $submission_id);
}

function ft_api_show_submission_count($form_id, $view_id = "") {
    $API = ft_api_get();
    return $API->showSubmissionCount($form_id, $view_id);
}

function ft_api_create_blank_submission($form_id, $finalized = false, $default_values = array()) {
    return API::createBlankSubmission($form_id, $finalized, $default_values);
}

function ft_api_init_form_page($form_id = "", $mode = "live", $namespace = "form_tools_form") {
    return API::initFormPage($form_id, $mode, $namespace);
}

function ft_api_clear_form_sessions($namespace = "form_tools_form") {
    API::clearFormSessions($namespace);
}

function ft_api_process_form($params) {
    return API::processForm($params);
}

function ft_api_display_image_field($params) {
    return API::displayImageField($params);
}

function ft_api_load_field($field_name, $session_name, $default_value) {
    $api = ft_api_get();
    return $api->loadField($field_name, $session_name, $default_value);
}

function ft_api_login($info) {
    API::login($info);
}

function ft_api_create_client_account($account_info) {
    $api = ft_api_get();
    return $api->createClientAccount($account_info);
}

function ft_api_update_client_account($account_id, $info) {
    return API::updateClientAccount($account_id, $info);
}

function ft_api_delete_client_account($account_id) {
    return API::deleteClientAccount($account_id);
}

function ft_api_delete_unfinalized_submissions($form_id, $delete_all = false) {
    return API::deleteUnfinalizedSubmissions($form_id, $delete_all);
}

function ft_api_display_captcha() {
    return API::displayCaptcha();
}

function ft_api_check_submission_is_unique($form_id, $criteria, $current_submission_id = "") {
    return API::checkSubmissionIsUnique($form_id, $criteria, $current_submission_id);
}

function ft_api_start_sessions() {
    Core::startSessions();
}

function ft_api_display_post_form_captcha_error($message = "") {
    return API::displayPostFormCaptchaError($message);
}

function ft_api_get_submission($form_id, $submission_id) {
    $api = ft_api_get();
    return $api->getSubmission($form_id, $submission_id);
}
