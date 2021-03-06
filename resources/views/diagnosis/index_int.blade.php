@extends('layouts.dentist.app')
@push('page_css')
<style>
    .tag-ctn {
        position: relative;
        height: 28px;
        padding: 0;
        margin-bottom: 0px;
        font-size: 14px;
        line-height: 20px;
        color: #555555;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
        -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
        -o-transition: border linear 0.2s, box-shadow linear 0.2s;
        transition: border linear 0.2s, box-shadow linear 0.2s;
        cursor: default;
        display: block;
    }

    .tag-ctn-invalid {
        border: 1px solid #CC0000;
    }

    .tag-ctn-readonly {
        cursor: pointer;
    }

    .tag-ctn-disabled {
        cursor: not-allowed;
        background-color: #eeeeee;
    }

    .tag-ctn-bootstrap-focus,
    .tag-ctn-bootstrap-focus .tag-res-ctn {
        border-color: rgba(82, 168, 236, 0.8) !important;
        /* IE6-9 */
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6) !important;
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6) !important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6) !important;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .tag-ctn input {
        border: 0;
        box-shadow: none;
        -webkit-transition: none;
        outline: none;
        display: block;
        padding: 4px 6px;
        line-height: normal;
        overflow: hidden;
        height: auto;
        border-radius: 0;
        float: left;
        margin: 2px 0 2px 2px;
    }

    .tag-ctn-disabled input {
        cursor: not-allowed;
        background-color: #eeeeee;
    }

    .tag-ctn .tag-input-readonly {
        cursor: pointer;
    }

    .tag-ctn .tag-empty-text {
        color: #DDD;
    }

    .tag-ctn input:focus {
        border: 0;
        box-shadow: none;
        -webkit-transition: none;
        background: #FFF;
    }

    .tag-ctn .tag-trigger {
        float: right;
        width: 27px;
        height: 100%;
        position: absolute;
        right: 0;
        border-left: 1px solid #CCC;
        background: #EEE;
        cursor: pointer;
    }

    .tag-ctn .tag-trigger .tag-trigger-ico {
        display: inline-block;
        width: 0;
        height: 0;
        vertical-align: top;
        border-top: 4px solid gray;
        border-right: 4px solid transparent;
        border-left: 4px solid transparent;
        content: "";
        margin-left: 9px;
        margin-top: 13px;
    }

    .tag-ctn .tag-trigger:hover {
        background: -moz-linear-gradient(100% 100% 90deg, #e3e3e3, #f1f1f1);
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#f1f1f1), to(#e3e3e3));
    }

    .tag-ctn .tag-trigger:hover .tag-trigger-ico {
        background-position: 0 -4px;
    }

    .tag-ctn-disabled .tag-trigger {
        cursor: not-allowed;
        background-color: #eeeeee;
    }

    .tag-ctn-bootstrap-focus {
        border-bottom: 1px solid #CCC;
    }

    .tag-res-ctn {
        position: relative;
        background: #FFF;
        overflow-y: auto;
        z-index: 9999;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        border: 1px solid #CCC;
        left: -1px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
        -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
        -o-transition: border linear 0.2s, box-shadow linear 0.2s;
        transition: border linear 0.2s, box-shadow linear 0.2s;
        border-top: 0;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .tag-res-ctn .tag-res-group {
        line-height: 23px;
        text-align: left;
        padding: 2px 5px;
        font-weight: bold;
        border-bottom: 1px dotted #CCC;
        border-top: 1px solid #CCC;
        background: #f3edff;
        color: #333;
    }

    .tag-res-ctn .tag-res-item {
        line-height: 25px;
        text-align: left;
        padding: 2px 5px;
        color: #666;
        cursor: pointer;
    }

    .tag-res-ctn .tag-res-item-grouped {
        padding-left: 15px;
    }

    .tag-res-ctn .tag-res-odd {
        background: #F3F3F3;
    }

    .tag-res-ctn .tag-res-item-active {
        background-color: #3875D7;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3875D7', endColorstr='#2A62BC', GradientType=0);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, color-stop(20%, #3875D7), color-stop(90%, #2A62BC));
        background-image: -webkit-linear-gradient(top, #3875D7 20%, #2A62BC 90%);
        background-image: -moz-linear-gradient(top, #3875D7 20%, #2A62BC 90%);
        background-image: -o-linear-gradient(top, #3875D7 20%, #2A62BC 90%);
        background-image: linear-gradient(#3875D7 20%, #2A62BC 90%);
        color: #fff;
    }

    .tag-sel-ctn {
        overflow: auto;
        line-height: 22px;
        padding-right: 27px;
    }

    .tag-sel-ctn .tag-sel-item {
        background: #555;
        color: #EEE;
        float: left;
        font-size: 12px;
        padding: 0 5px;
        border-radius: 3px;
        margin-left: 5px;
        margin-top: 4px;
    }

    .tag-sel-ctn .tag-sel-text {
        background: #FFF;
        color: #666;
        padding-right: 0;
        margin-left: 0;
        font-size: 14px;
        font-weight: normal;
    }

    .tag-res-ctn .tag-res-item em {
        font-style: normal;
        background: #565656;
        color: #FFF;
    }

    .tag-sel-ctn .tag-sel-item:hover {
        background: #565656;
    }

    .tag-sel-ctn .tag-sel-text:hover {
        background: #FFF;
    }

    .tag-sel-ctn .tag-sel-item-active {
        border: 1px solid red;
        background: #757575;
    }

    .tag-ctn .tag-sel-ctn .tag-sel-item {
        margin-top: 3px;
    }

    .tag-stacked .tag-sel-item {
        float: inherit;
    }

    .tag-sel-ctn .tag-sel-item .tag-close-btn {
        width: 7px;
        cursor: pointer;
        height: 7px;
        float: right;
        margin: 8px 2px 0 10px;
        background-image: url(data:image/png;base64,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);

    }

    .tag-sel-ctn .tag-sel-item .tag-close-btn:hover {
        background-position: 0 -7px;
    }

    .tag-helper {
        color: #AAA;
        font-size: 10px;
        position: absolute;
        top: -17px;
        right: 0;
    }

    /* bg color card */

    .bg-suggest {
        background-color: #edfaf9 !important;
        color: black !important;
    }

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

@endpush

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Diagnosis Aid</li>

</ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-8 m-autox">
            <div class="card card-accent-success">
                <div class="card-header font-monospace font-lg">Diagnosis Aid Form</div>
                <form action="{{ route('diagnosis.store_diagnosis_int', [$patient->id, $meetingid]) }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <!-- <input type="hidden" name="patient_id" value="3" /> -->
                        <input type="hidden" name="dentist_id" value="{{ Auth::user()->id }}" />

                        <span>Enter Symptoms :</span><br><br>
                        <input id="sel_symp" class="tag-ctn" style="width:400px;" type="text" name="sel_symp" />
                        <br>
                        <div class="text-right">
                            <button id="btn_get_cond_suggest" type="button" class="btn btn-success">Submit</button>
                        </div>
                        <div id="cond_suggestion">
                        </div>
                        <div id="presc_suggestion">
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-4 m-autoX">
            <div class="card border-info">
                <div class="card-header font-monospace font-lg">Diagnosis Details</div>
                <div class="card-body">
                    <div class="mb-2 row">
                        <label class="col-sm-4 col-form-label font-weight-bold" for="date">Date :</label>
                        <div class="col-sm-7">
                            <input class="form-control-plaintext" id="datePicker" type="date" name="date" readonly>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label font-weight-bold" for="name">Patient Name :</label>
                        <div class="col-sm-5">
                            <input class="form-control-plaintext" type="text" name="patient_id" value="{{ $patient->id }}" hidden>
                            <input class="form-control-plaintext" type="text" value="{{ $patient->name }}">
                        </div>
                        <div class="col-sm-2 text-right">
                            <a id="btnview" target="_blank" class="btn btn-info cil-notes" href="{{ route('diagnosis.viewrecords', $patient->id) }}"></a>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-4x col-form-label font-weight-bold" for="date">Notes :</label>
                        <div class="col-sm-7x">
                            <textarea class="form-control" name="notes" rows="5"
                                placeholder="Add notes here..." spellcheck="false"></textarea>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page_scripts')
<script>
    document.getElementById('datePicker').valueAsDate = new Date();


    /**
     * All auto suggestion boxes are fucked up or badly written.
     * This is an attempt to create something that doesn't suck...
     *
     * Requires: jQuery
     *
     * Author: Nicolas Bize
     * Date: Feb. 8th 2013
     * Version: 1.3.1
     * Licence: TagSuggest is licenced under MIT licence (https://www.opensource.org/licenses/mit-license.php)
     */
    $(document).ready(function () {
        "use strict";
        var TagSuggest = function (element, options) {
            var ms = this;

            /**
             * Initializes the TagSuggest component
             * @param defaults - see config below
             */
            var defaults = {
                /**********  CONFIGURATION PROPERTIES ************/
                /**
                 * @cfg {Boolean} allowFreeEntries
                 * <p>Restricts or allows the user to validate typed entries.</p>
                 * Defaults to <code>true</code>.
                 */
                allowFreeEntries: true,

                /**
                 * @cfg {String} cls
                 * <p>A custom CSS class to apply to the field's underlying element.</p>
                 * Defaults to <code>''</code>.
                 */
                cls: '',

                /**
                 * @cfg {Array / String / Function} data
                 * JSON Data source used to populate the combo box. 3 options are available here:<br/>
                 * <p><u>No Data Source (default)</u><br/>
                 *    When left null, the combo box will not suggest anything. It can still enable the user to enter
                 *    multiple entries if allowFreeEntries is * set to true (default).</p>
                 * <p><u>Static Source</u><br/>
                 *    You can pass an array of JSON objects, an array of strings or even a single CSV string as the
                 *    data source.<br/>For ex. data: [* {id:0,name:"Paris"}, {id: 1, name: "New York"}]<br/>
                 *    You can also pass any json object with the results property containing the json array.</p>
                 * <p><u>Url</u><br/>
                 *     You can pass the url from which the component will fetch its JSON data.<br/>Data will be fetched
                 *     using a POST ajax request that will * include the entered text as 'query' parameter. The results
                 *     fetched from the server can be: <br/>
                 *     - an array of JSON objects (ex: [{id:...,name:...},{...}])<br/>
                 *     - a string containing an array of JSON objects ready to be parsed (ex: "[{id:...,name:...},{...}]")<br/>
                 *     - a JSON object whose data will be contained in the results property
                 *      (ex: {results: [{id:...,name:...},{...}]</p>
                 * <p><u>Function</u><br/>
                 *     You can pass a function which returns an array of JSON objects  (ex: [{id:...,name:...},{...}])<br/>
                 *     The function can return the JSON data or it can use the first argument as function to handle the data.<br/>
                 *     Only one (callback function or return value) is needed for the function to succeed.<br/>
                 *     See the following example:<br/>
                 *     function (response) { var myjson = [{name: 'test', id: 1}]; response(myjson); return myjson; }</p>
                 * Defaults to <b>null</b>
                 */
                data: null,

                /**
                 * @cfg {Object} dataParams
                 * <p>Additional parameters to the ajax call</p>
                 * Defaults to <code>{}</code>
                 */
                dataUrlParams: {},

                /**
                 * @cfg {Boolean} disabled
                 * <p>Start the component in a disabled state.</p>
                 * Defaults to <code>false</code>.
                 */
                disabled: false,

                /**
                 * @cfg {String} displayField
                 * <p>name of JSON object property displayed in the combo list</p>
                 * Defaults to <code>name</code>.
                 */
                displayField: 'name',

                /**
                 * @cfg {Boolean} editable
                 * <p>Set to false if you only want mouse interaction. In that case the combo will
                 * automatically expand on focus.</p>
                 * Defaults to <code>true</code>.
                 */
                editable: true,

                /**
                 * @cfg {String} emptyText
                 * <p>The default placeholder text when nothing has been entered</p>
                 * Defaults to <code>'Type or click here'</code> or just <code>'Click here'</code> if not editable.
                 */
                emptyText: function () {
                    return cfg.editable ? 'Type or click here' : 'Click here';
                },

                /**
                 * @cfg {String} emptyTextCls
                 * <p>A custom CSS class to style the empty text</p>
                 * Defaults to <code>'tag-empty-text'</code>.
                 */
                emptyTextCls: 'tag-empty-text',

                /**
                 * @cfg {Boolean} expanded
                 * <p>Set starting state for combo.</p>
                 * Defaults to <code>false</code>.
                 */
                expanded: false,

                /**
                 * @cfg {Boolean} expandOnFocus
                 * <p>Automatically expands combo on focus.</p>
                 * Defaults to <code>false</code>.
                 */
                expandOnFocus: function () {
                    return cfg.editable ? false : true;
                },

                /**
                 * @cfg {String} groupBy
                 * <p>JSON property by which the list should be grouped</p>
                 * Defaults to null
                 */
                groupBy: null,

                /**
                 * @cfg {Boolean} hideTrigger
                 * <p>Set to true to hide the trigger on the right</p>
                 * Defaults to <code>false</code>.
                 */
                hideTrigger: false,

                /**
                 * @cfg {Boolean} highlight
                 * <p>Set to true to highlight search input within displayed suggestions</p>
                 * Defaults to <code>true</code>.
                 */
                highlight: true,

                /**
                 * @cfg {String} id
                 * <p>A custom ID for this component</p>
                 * Defaults to 'tag-ctn-{n}' with n positive integer
                 */
                id: function () {
                    return 'tag-ctn-' + $('div[id^="tag-ctn"]').length;
                },

                /**
                 * @cfg {String} infoMsgCls
                 * <p>A class that is added to the info message appearing on the top-right part of the component</p>
                 * Defaults to ''
                 */
                infoMsgCls: '',

                /**
                 * @cfg {Object} inputCfg
                 * <p>Additional parameters passed out to the INPUT tag. Enables usage of AngularJS's custom tags for ex.</p>
                 * Defaults to <code>{}</code>
                 */
                inputCfg: {},

                /**
                 * @cfg {String} invalidCls
                 * <p>The class that is applied to show that the field is invalid</p>
                 * Defaults to tag-ctn-invalid
                 */
                invalidCls: 'tag-ctn-invalid',

                /**
                 * @cfg {Boolean} matchCase
                 * <p>Set to true to filter data results according to case. Useless if the data is fetched remotely</p>
                 * Defaults to <code>false</code>.
                 */
                matchCase: false,

                /**
                 * @cfg {Integer} maxDropHeight (in px)
                 * <p>Once expanded, the combo's height will take as much room as the # of available results.
                 *    In case there are too many results displayed, this will fix the drop down height.</p>
                 * Defaults to 290 px.
                 */
                maxDropHeight: 290,

                /**
                 * @cfg {Integer} maxEntryLength
                 * <p>Defines how long the user free entry can be. Set to null for no limit.</p>
                 * Defaults to null.
                 */
                maxEntryLength: null,

                /**
                 * @cfg {String} maxEntryRenderer
                 * <p>A function that defines the helper text when the max entry length has been surpassed.</p>
                 * Defaults to <code>function(v){return 'Please reduce your entry by ' + v + ' character' + (v > 1 ? 's':'');}</code>
                 */
                maxEntryRenderer: function (v) {
                    return 'Please reduce your entry by ' + v + ' character' + (v > 1 ? 's' : '');
                },

                /**
                 * @cfg {Integer} maxSuggestions
                 * <p>The maximum number of results displayed in the combo drop down at once.</p>
                 * Defaults to null.
                 */
                maxSuggestions: null,

                /**
                 * @cfg {Integer} maxSelection
                 * <p>The maximum number of items the user can select if multiple selection is allowed.
                 *    Set to null to remove the limit.</p>
                 * Defaults to 10.
                 */
                maxSelection: 10,

                /**
                 * @cfg {Function} maxSelectionRenderer
                 * <p>A function that defines the helper text when the max selection amount has been reached. The function has a single
                 *    parameter which is the number of selected elements.</p>
                 * Defaults to <code>function(v){return 'You cannot choose more than ' + v + ' item' + (v > 1 ? 's':'');}</code>
                 */
                maxSelectionRenderer: function (v) {
                    return 'You cannot choose more than ' + v + ' item' + (v > 1 ? 's' : '');
                },

                /**
                 * @cfg {String} method
                 * <p>The method used by the ajax request.</p>
                 * Defaults to 'POST'
                 */
                method: 'POST',

                /**
                 * @cfg {Integer} minChars
                 * <p>The minimum number of characters the user must type before the combo expands and offers suggestions.
                 * Defaults to <code>0</code>.
                 */
                minChars: 0,

                /**
                 * @cfg {Function} minCharsRenderer
                 * <p>A function that defines the helper text when not enough letters are set. The function has a single
                 *    parameter which is the difference between the required amount of letters and the current one.</p>
                 * Defaults to <code>function(v){return 'Please type ' + v + ' more character' + (v > 1 ? 's':'');}</code>
                 */
                minCharsRenderer: function (v) {
                    return 'Please type ' + v + ' more character' + (v > 1 ? 's' : '');
                },

                /**
                 * @cfg {String} name
                 * <p>The name used as a form element.</p>
                 * Defaults to 'null'
                 */
                name: null,

                /**
                 * @cfg {String} noSuggestionText
                 * <p>The text displayed when there are no suggestions.</p>
                 * Defaults to 'No suggestions"
                 */
                noSuggestionText: 'No suggestions',

                /**
                 * @cfg {Boolean} preselectSingleSuggestion
                 * <p>If a single suggestion comes out, it is preselected.</p>
                 * Defaults to <code>true</code>.
                 */
                preselectSingleSuggestion: true,

                /**
                 * @cfg (function) renderer
                 * <p>A function used to define how the items will be presented in the combo</p>
                 * Defaults to <code>null</code>.
                 */
                renderer: null,

                /**
                 * @cfg {Boolean} required
                 * <p>Whether or not this field should be required</p>
                 * Defaults to false
                 */
                required: false,

                /**
                 * @cfg {Boolean} resultAsString
                 * <p>Set to true to render selection as comma separated string</p>
                 * Defaults to <code>false</code>.
                 */
                resultAsString: false,

                /**
                 * @cfg {String} resultsField
                 * <p>Name of JSON object property that represents the list of suggested objets</p>
                 * Defaults to <code>results</code>
                 */
                resultsField: 'results',

                /**
                 * @cfg {String} selectionCls
                 * <p>A custom CSS class to add to a selected item</p>
                 * Defaults to <code>''</code>.
                 */
                selectionCls: '',

                /**
                 * @cfg {String} selectionPosition
                 * <p>Where the selected items will be displayed. Only 'right', 'bottom' and 'inner' are valid values</p>
                 * Defaults to <code>'inner'</code>, meaning the selected items will appear within the input box itself.
                 */
                selectionPosition: 'inner',

                /**
                 * @cfg (function) selectionRenderer
                 * <p>A function used to define how the items will be presented in the tag list</p>
                 * Defaults to <code>null</code>.
                 */
                selectionRenderer: null,

                /**
                 * @cfg {Boolean} selectionStacked
                 * <p>Set to true to stack the selectioned items when positioned on the bottom
                 *    Requires the selectionPosition to be set to 'bottom'</p>
                 * Defaults to <code>false</code>.
                 */
                selectionStacked: false,

                /**
                 * @cfg {String} sortDir
                 * <p>Direction used for sorting. Only 'asc' and 'desc' are valid values</p>
                 * Defaults to <code>'asc'</code>.
                 */
                sortDir: 'asc',

                /**
                 * @cfg {String} sortOrder
                 * <p>name of JSON object property for local result sorting.
                 *    Leave null if you do not wish the results to be ordered or if they are already ordered remotely.</p>
                 *
                 * Defaults to <code>null</code>.
                 */
                sortOrder: null,

                /**
                 * @cfg {Boolean} strictSuggest
                 * <p>If set to true, suggestions will have to start by user input (and not simply contain it as a substring)</p>
                 * Defaults to <code>false</code>.
                 */
                strictSuggest: false,

                /**
                 * @cfg {String} style
                 * <p>Custom style added to the component container.</p>
                 *
                 * Defaults to <code>''</code>.
                 */
                style: '',

                /**
                 * @cfg {Boolean} toggleOnClick
                 * <p>If set to true, the combo will expand / collapse when clicked upon</p>
                 * Defaults to <code>false</code>.
                 */
                toggleOnClick: false,


                /**
                 * @cfg {Integer} typeDelay
                 * <p>Amount (in ms) between keyboard registers.</p>
                 *
                 * Defaults to <code>400</code>
                 */
                typeDelay: 400,

                /**
                 * @cfg {Boolean} useTabKey
                 * <p>If set to true, tab won't blur the component but will be registered as the ENTER key</p>
                 * Defaults to <code>false</code>.
                 */
                useTabKey: false,

                /**
                 * @cfg {Boolean} useCommaKey
                 * <p>If set to true, using comma will validate the user's choice</p>
                 * Defaults to <code>true</code>.
                 */
                useCommaKey: true,


                /**
                 * @cfg {Boolean} useZebraStyle
                 * <p>Determines whether or not the results will be displayed with a zebra table style</p>
                 * Defaults to <code>true</code>.
                 */
                useZebraStyle: true,

                /**
                 * @cfg {String/Object/Array} value
                 * <p>initial value for the field</p>
                 * Defaults to <code>null</code>.
                 */
                value: null,

                /**
                 * @cfg {String} valueField
                 * <p>name of JSON object property that represents its underlying value</p>
                 * Defaults to <code>id</code>.
                 */
                valueField: 'id',

                /**
                 * @cfg {Integer} width (in px)
                 * <p>Width of the component</p>
                 * Defaults to underlying element width.
                 */
                width: function () {
                    return $(this).width();
                }
            };

            var conf = $.extend({}, options);
            var cfg = $.extend(true, {}, defaults, conf);

            // some init stuff
            if ($.isFunction(cfg.emptyText)) {
                cfg.emptyText = cfg.emptyText.call(this);
            }
            if ($.isFunction(cfg.expandOnFocus)) {
                cfg.expandOnFocus = cfg.expandOnFocus.call(this);
            }
            if ($.isFunction(cfg.id)) {
                cfg.id = cfg.id.call(this);
            }

            /**********  PUBLIC METHODS ************/
            /**
             * Add one or multiple json items to the current selection
             * @param items - json object or array of json objects
             * @param isSilent - (optional) set to true to suppress 'selectionchange' event from being triggered
             */
            this.addToSelection = function (items, isSilent) {
                if (!cfg.maxSelection || _selection.length < cfg.maxSelection) {
                    if (!$.isArray(items)) {
                        items = [items];
                    }
                    var valuechanged = false;
                    $.each(items, function (index, json) {
                        if ($.inArray(json[cfg.valueField], ms.getValue()) === -1) {
                            _selection.push(json);
                            valuechanged = true;
                        }
                    });
                    if (valuechanged === true) {
                        self._renderSelection();
                        this.empty();
                        if (isSilent !== true) {
                            $(this).trigger('selectionchange', [this, this.getSelectedItems()]);
                        }
                    }
                }
            };

            /**
             * Clears the current selection
             * @param isSilent - (optional) set to true to suppress 'selectionchange' event from being triggered
             */
            this.clear = function (isSilent) {
                this.removeFromSelection(_selection.slice(0),
                    isSilent); // clone array to avoid concurrency issues
            };

            /**
             * Collapse the drop down part of the combo
             */
            this.collapse = function () {
                if (cfg.expanded === true) {
                    this.combobox.detach();
                    cfg.expanded = false;
                    $(this).trigger('collapse', [this]);
                }
            };

            /**
             * Set the component in a disabled state.
             */
            this.disable = function () {
                this.container.addClass('tag-ctn-disabled');
                cfg.disabled = true;
                ms.input.attr('disabled', true);
            };

            /**
             * Empties out the combo user text
             */
            this.empty = function () {
                this.input.removeClass(cfg.emptyTextCls);
                this.input.val('');
            };

            /**
             * Set the component in a enable state.
             */
            this.enable = function () {
                this.container.removeClass('tag-ctn-disabled');
                cfg.disabled = false;
                ms.input.attr('disabled', false);
            };

            /**
             * Expand the drop drown part of the combo.
             */
            this.expand = function () {
                if (!cfg.expanded && (this.input.val().length >= cfg.minChars || this.combobox
                        .children().size() > 0)) {
                    this.combobox.appendTo(this.container);
                    self._processSuggestions();
                    cfg.expanded = true;
                    $(this).trigger('expand', [this]);
                }
            };

            /**
             * Retrieve component enabled status
             */
            this.isDisabled = function () {
                return cfg.disabled;
            };

            /**
             * Checks whether the field is valid or not
             * @return {boolean}
             */
            this.isValid = function () {
                return cfg.required === false || _selection.length > 0;
            };

            /**
             * Gets the data params for current ajax request
             */
            this.getDataUrlParams = function () {
                return cfg.dataUrlParams;
            };

            /**
             * Gets the name given to the form input
             */
            this.getName = function () {
                return cfg.name;
            };

            /**
             * Retrieve an array of selected json objects
             * @return {Array}
             */
            this.getSelectedItems = function () {
                return _selection;
            };

            /**
             * Retrieve the current text entered by the user
             */
            this.getRawValue = function () {
                return ms.input.val() !== cfg.emptyText ? ms.input.val() : '';
            };

            /**
             * Retrieve an array of selected values
             */
            this.getValue = function () {
                return $.map(_selection, function (o) {
                    return o[cfg.valueField];
                });
            };

            /**
             * Remove one or multiples json items from the current selection
             * @param items - json object or array of json objects
             * @param isSilent - (optional) set to true to suppress 'selectionchange' event from being triggered
             */
            this.removeFromSelection = function (items, isSilent) {
                if (!$.isArray(items)) {
                    items = [items];
                }
                var valuechanged = false;
                $.each(items, function (index, json) {
                    var i = $.inArray(json[cfg.valueField], ms.getValue());
                    if (i > -1) {
                        _selection.splice(i, 1);
                        valuechanged = true;
                    }
                });
                if (valuechanged === true) {
                    self._renderSelection();
                    if (isSilent !== true) {
                        $(this).trigger('selectionchange', [this, this.getSelectedItems()]);
                    }
                    if (cfg.expandOnFocus) {
                        ms.expand();
                    }
                    if (cfg.expanded) {
                        self._processSuggestions();
                    }
                }
            };

            /**
             * Set up some combo data after it has been rendered
             * @param data
             */
            this.setData = function (data) {
                cfg.data = data;
                self._processSuggestions();
            };

            /**
             * Sets the name for the input field so it can be fetched in the form
             * @param name
             */
            this.setName = function (name) {
                cfg.name = name;
                if (ms._valueContainer) {
                    ms._valueContainer.name = name;
                }
            };

            /**
             * Sets a value for the combo box. Value must be a value or an array of value with data type matching valueField one.
             * @param data
             */
            this.setValue = function (data) {
                var values = data,
                    items = [];
                if (!$.isArray(data)) {
                    if (typeof (data) === 'string') {
                        if (data.indexOf('[') > -1) {
                            values = eval(data);
                        } else if (data.indexOf(',') > -1) {
                            values = data.split(',');
                        }
                    } else {
                        values = [data];
                    }
                }

                $.each(_cbData, function (index, obj) {
                    if ($.inArray(obj[cfg.valueField], values) > -1) {
                        items.push(obj);
                    }
                });
                if (items.length > 0) {
                    this.addToSelection(items);
                }
            };

            /**
             * Sets data params for subsequent ajax requests
             * @param params
             */
            this.setDataUrlParams = function (params) {
                cfg.dataUrlParams = $.extend({}, params);
            };

            /**********  PRIVATE ************/
            var _selection = [], // selected objects
                _comboItemHeight = 0, // height for each combo item.
                _timer,
                _hasFocus = false,
                _groups = null,
                _cbData = [],
                _ctrlDown = false;

            var self = {

                /**
                 * Empties the result container and refills it with the array of json results in input
                 * @private
                 */
                _displaySuggestions: function (data) {
                    ms.combobox.empty();

                    var resHeight = 0, // total height taken by displayed results.
                        nbGroups = 0;

                    if (_groups === null) {
                        self._renderComboItems(data);
                        resHeight = _comboItemHeight * data.length;
                    } else {
                        for (var grpName in _groups) {
                            nbGroups += 1;
                            $('<div/>', {
                                'class': 'tag-res-group',
                                html: grpName
                            }).appendTo(ms.combobox);
                            self._renderComboItems(_groups[grpName].items, true);
                        }
                        resHeight = _comboItemHeight * (data.length + nbGroups);
                    }

                    if (resHeight < ms.combobox.height() || resHeight <= cfg.maxDropHeight) {
                        ms.combobox.height(resHeight);
                    } else if (resHeight >= ms.combobox.height() && resHeight > cfg.maxDropHeight) {
                        ms.combobox.height(cfg.maxDropHeight);
                    }

                    if (data.length === 1 && cfg.preselectSingleSuggestion === true) {
                        ms.combobox.children().filter(':last').addClass('tag-res-item-active');
                    }

                    if (data.length === 0 && ms.getRawValue() !== "") {
                        self._updateHelper(cfg.noSuggestionText);
                        ms.collapse();
                    }
                },

                /**
                 * Returns an array of json objects from an array of strings.
                 * @private
                 */
                _getEntriesFromStringArray: function (data) {
                    var json = [];
                    $.each(data, function (index, s) {
                        var entry = {};
                        entry[cfg.displayField] = entry[cfg.valueField] = $.trim(s);
                        json.push(entry);
                    });
                    return json;
                },

                /**
                 * Replaces html with highlighted html according to case
                 * @param html
                 * @private
                 */
                _highlightSuggestion: function (html) {
                    var q = ms.input.val() !== cfg.emptyText ? ms.input.val() : '';
                    if (q.length === 0) {
                        return html; // nothing entered as input
                    }

                    if (cfg.matchCase === true) {
                        html = html.replace(new RegExp('(' + q + ')(?!([^<]+)?>)', 'g'),
                            '<em>$1</em>');
                    } else {
                        html = html.replace(new RegExp('(' + q + ')(?!([^<]+)?>)', 'gi'),
                            '<em>$1</em>');
                    }
                    return html;
                },

                /**
                 * Moves the selected cursor amongst the list item
                 * @param dir - 'up' or 'down'
                 * @private
                 */
                _moveSelectedRow: function (dir) {
                    if (!cfg.expanded) {
                        ms.expand();
                    }
                    var list, start, active, scrollPos;
                    list = ms.combobox.find(".tag-res-item");
                    if (dir === 'down') {
                        start = list.eq(0);
                    } else {
                        start = list.filter(':last');
                    }
                    active = ms.combobox.find('.tag-res-item-active:first');
                    if (active.length > 0) {
                        if (dir === 'down') {
                            start = active.nextAll('.tag-res-item').first();
                            if (start.length === 0) {
                                start = list.eq(0);
                            }
                            scrollPos = ms.combobox.scrollTop();
                            ms.combobox.scrollTop(0);
                            if (start[0].offsetTop + start.outerHeight() > ms.combobox.height()) {
                                ms.combobox.scrollTop(scrollPos + _comboItemHeight);
                            }
                        } else {
                            start = active.prevAll('.tag-res-item').first();
                            if (start.length === 0) {
                                start = list.filter(':last');
                                ms.combobox.scrollTop(_comboItemHeight * list.length);
                            }
                            if (start[0].offsetTop < ms.combobox.scrollTop()) {
                                ms.combobox.scrollTop(ms.combobox.scrollTop() - _comboItemHeight);
                            }
                        }
                    }
                    list.removeClass("tag-res-item-active");
                    start.addClass("tag-res-item-active");
                },

                /**
                 * According to given data and query, sort and add suggestions in their container
                 * @private
                 */
                _processSuggestions: function (source) {
                    var json = null,
                        data = source || cfg.data;
                    if (data !== null) {
                        if (typeof (data) === 'function') {
                            data = data.call(ms);
                        }
                        if (typeof (data) === 'string' && data.indexOf(',') <
                            0) { // get results from ajax
                            $(ms).trigger('beforeload', [ms]);
                            var params = $.extend({
                                query: ms.input.val()
                            }, cfg.dataUrlParams);
                            $.ajax({
                                type: cfg.method,
                                url: data,
                                data: params,
                                success: function (asyncData) {
                                    json = typeof (asyncData) === 'string' ? JSON.parse(
                                        asyncData) : asyncData;
                                    self._processSuggestions(json);
                                    $(ms).trigger('load', [ms, json]);
                                },
                                error: function () {
                                    throw ("Could not reach server");
                                }
                            });
                            return;
                        } else if (typeof (data) === 'string' && data.indexOf(',') > -
                            1) { // results from csv string
                            _cbData = self._getEntriesFromStringArray(data.split(','));
                        } else { // results from local array
                            if (data.length > 0 && typeof (data[0]) ===
                                'string') { // results from array of strings
                                _cbData = self._getEntriesFromStringArray(data);
                            } else { // regular json array or json object with results property
                                _cbData = data[cfg.resultsField] || data;
                            }
                        }
                        self._displaySuggestions(self._sortAndTrim(_cbData));

                    }
                },

                /**
                 * Render the component to the given input DOM element
                 * @private
                 */
                _render: function (el) {
                    $(ms).trigger('beforerender', [ms]);
                    var w = $.isFunction(cfg.width) ? cfg.width.call(el) : cfg.width;
                    // holds the main div, will relay the focus events to the contained input element.
                    ms.container = $('<div/>', {
                        id: cfg.id,
                        'class': 'tag-ctn ' + cfg.cls +
                            (cfg.disabled === true ? ' tag-ctn-disabled' : '') +
                            (cfg.editable === true ? '' : ' tag-ctn-readonly'),
                        style: cfg.style
                    }).width(w);
                    ms.container.focus($.proxy(handlers._onFocus, this));
                    ms.container.blur($.proxy(handlers._onBlur, this));
                    ms.container.keydown($.proxy(handlers._onKeyDown, this));
                    ms.container.keyup($.proxy(handlers._onKeyUp, this));

                    // holds the input field
                    ms.input = $('<input/>', $.extend({
                        id: 'tag-input-' + $('input[id^="tag-input"]').length,
                        type: 'text',
                        'class': cfg.emptyTextCls + (cfg.editable === true ? '' :
                            ' tag-input-readonly'),
                        value: cfg.emptyText,
                        readonly: !cfg.editable,
                        disabled: cfg.disabled
                    }, cfg.inputCfg)).width(w - (cfg.hideTrigger ? 16 : 42));

                    ms.input.focus($.proxy(handlers._onInputFocus, this));
                    ms.input.click($.proxy(handlers._onInputClick, this));

                    // holds the trigger on the right side
                    if (cfg.hideTrigger === false) {
                        ms.trigger = $('<div/>', {
                            id: 'tag-trigger-' + $('div[id^="tag-trigger"]').length,
                            'class': 'tag-trigger',
                            html: '<div class="tag-trigger-ico"></div>'
                        });
                        ms.trigger.click($.proxy(handlers._onTriggerClick, this));
                        ms.container.append(ms.trigger);
                    }

                    // holds the suggestions. will always be placed on focus
                    ms.combobox = $('<div/>', {
                        id: 'tag-res-ctn-' + $('div[id^="tag-res-ctn"]').length,
                        'class': 'tag-res-ctn '
                    }).width(w).height(cfg.maxDropHeight);

                    // bind the onclick and mouseover using delegated events (needs jQuery >= 1.7)
                    ms.combobox.on('click', 'div.tag-res-item', $.proxy(handlers
                        ._onComboItemSelected, this));
                    ms.combobox.on('mouseover', 'div.tag-res-item', $.proxy(handlers
                        ._onComboItemMouseOver, this));

                    ms.selectionContainer = $('<div/>', {
                        id: 'tag-sel-ctn-' + $('div[id^="tag-sel-ctn"]').length,
                        'class': 'tag-sel-ctn'
                    });
                    ms.selectionContainer.click($.proxy(handlers._onFocus, this));

                    if (cfg.selectionPosition === 'inner') {
                        ms.selectionContainer.append(ms.input);
                    } else {
                        ms.container.append(ms.input);
                    }

                    ms.helper = $('<div/>', {
                        'class': 'tag-helper ' + cfg.infoMsgCls
                    });
                    self._updateHelper();
                    ms.container.append(ms.helper);


                    // Render the whole thing
                    $(el).replaceWith(ms.container);

                    switch (cfg.selectionPosition) {
                        case 'bottom':
                            ms.selectionContainer.insertAfter(ms.container);
                            if (cfg.selectionStacked === true) {
                                ms.selectionContainer.width(ms.container.width());
                                ms.selectionContainer.addClass('tag-stacked');
                            }
                            break;
                        case 'right':
                            ms.selectionContainer.insertAfter(ms.container);
                            ms.container.css('float', 'left');
                            break;
                        default:
                            ms.container.append(ms.selectionContainer);
                            break;
                    }

                    self._processSuggestions();
                    if (cfg.value !== null) {
                        ms.setValue(cfg.value);
                        self._renderSelection();
                    }

                    $(ms).trigger('afterrender', [ms]);
                    $("body").click(function (e) {
                        if (ms.container.hasClass('tag-ctn-bootstrap-focus') &&
                            ms.container.has(e.target).length === 0 &&
                            e.target.className.indexOf('tag-res-item') < 0 &&
                            e.target.className.indexOf('tag-close-btn') < 0 &&
                            ms.container[0] !== e.target) {
                            handlers._onBlur();
                        }
                    });

                    if (cfg.expanded === true) {
                        cfg.expanded = false;
                        ms.expand();
                    }
                },

                _renderComboItems: function (items, isGrouped) {
                    var ref = this,
                        html = '';
                    $.each(items, function (index, value) {
                        var displayed = cfg.renderer !== null ? cfg.renderer.call(ref,
                            value) : value[cfg.displayField];
                        var resultItemEl = $('<div/>', {
                            'class': 'tag-res-item ' + (isGrouped ?
                                    'tag-res-item-grouped ' : '') +
                                (index % 2 === 1 && cfg.useZebraStyle === true ?
                                    'tag-res-odd' : ''),
                            html: cfg.highlight === true ? self
                                ._highlightSuggestion(displayed) : displayed,
                            'data-json': JSON.stringify(value)
                        });
                        resultItemEl.click($.proxy(handlers._onComboItemSelected, ref));
                        resultItemEl.mouseover($.proxy(handlers._onComboItemMouseOver,
                            ref));
                        html += $('<div/>').append(resultItemEl).html();
                    });
                    ms.combobox.append(html);
                    _comboItemHeight = ms.combobox.find('.tag-res-item:first').outerHeight();
                },

                /**
                 * Renders the selected items into their container.
                 * @private
                 */
                _renderSelection: function () {
                    var ref = this,
                        w = 0,
                        inputOffset = 0,
                        items = [],
                        asText = cfg.resultAsString === true && !_hasFocus;

                    ms.selectionContainer.find('.tag-sel-item').remove();
                    if (ms._valueContainer !== undefined) {
                        ms._valueContainer.remove();
                    }

                    $.each(_selection, function (index, value) {

                        var selectedItemEl, delItemEl,
                            selectedItemHtml = cfg.selectionRenderer !== null ? cfg
                            .selectionRenderer.call(ref, value) : value[cfg.displayField];
                        // tag representing selected value
                        if (asText === true) {
                            selectedItemEl = $('<div/>', {
                                'class': 'tag-sel-item tag-sel-text ' + cfg
                                    .selectionCls,
                                html: selectedItemHtml + (index === (_selection
                                    .length - 1) ? '' : ',')
                            }).data('json', value);
                        } else {
                            selectedItemEl = $('<div/>', {
                                'class': 'tag-sel-item ' + cfg.selectionCls,
                                html: selectedItemHtml
                            }).data('json', value);

                            if (cfg.disabled === false) {
                                // small cross img
                                delItemEl = $('<span/>', {
                                    'class': 'tag-close-btn'
                                }).data('json', value).appendTo(selectedItemEl);

                                delItemEl.click($.proxy(handlers._onTagTriggerClick, ref));
                            }
                        }

                        items.push(selectedItemEl);
                    });

                    ms.selectionContainer.prepend(items);
                    ms._valueContainer = $('<input/>', {
                        type: 'hidden',
                        id: cfg.id + "-get",
                        name: cfg.name,
                        // value: JSON.stringify(ms.getValue())
                        value: ms.getValue()
                    });
                    ms._valueContainer.appendTo(ms.selectionContainer);

                    if (cfg.selectionPosition === 'inner') {
                        ms.input.width(0);
                        inputOffset = ms.input.offset().left - ms.selectionContainer.offset().left;
                        w = ms.container.width() - inputOffset - 42;
                        ms.input.width(w);
                        ms.container.height(ms.selectionContainer.height());
                    }

                    if (_selection.length === cfg.maxSelection) {
                        self._updateHelper(cfg.maxSelectionRenderer.call(this, _selection.length));
                    } else {
                        ms.helper.hide();
                    }
                },

                /**
                 * Select an item either through keyboard or mouse
                 * @param item
                 * @private
                 */
                _selectItem: function (item) {
                    if (cfg.maxSelection === 1) {
                        _selection = [];
                    }
                    ms.addToSelection(item.data('json'));
                    item.removeClass('tag-res-item-active');
                    if (cfg.expandOnFocus === false || _selection.length === cfg.maxSelection) {
                        ms.collapse();
                    }
                    if (!_hasFocus) {
                        ms.input.focus();
                    } else if (_hasFocus && (cfg.expandOnFocus || _ctrlDown)) {
                        self._processSuggestions();
                        if (_ctrlDown) {
                            ms.expand();
                        }
                    }
                },

                /**
                 * Sorts the results and cut them down to max # of displayed results at once
                 * @private
                 */
                _sortAndTrim: function (data) {
                    var q = ms.getRawValue(),
                        filtered = [],
                        newSuggestions = [],
                        selectedValues = ms.getValue();
                    // filter the data according to given input
                    if (q.length > 0) {
                        $.each(data, function (index, obj) {
                            var name = obj[cfg.displayField];
                            if ((cfg.matchCase === true && name.indexOf(q) > -1) ||
                                (cfg.matchCase === false && name.toLowerCase().indexOf(q
                                    .toLowerCase()) > -1)) {
                                if (cfg.strictSuggest === false || name.toLowerCase()
                                    .indexOf(q.toLowerCase()) === 0) {
                                    filtered.push(obj);
                                }
                            }
                        });
                    } else {
                        filtered = data;
                    }
                    // take out the ones that have already been selected
                    $.each(filtered, function (index, obj) {
                        if ($.inArray(obj[cfg.valueField], selectedValues) === -1) {
                            newSuggestions.push(obj);
                        }
                    });
                    // sort the data
                    if (cfg.sortOrder !== null) {
                        newSuggestions.sort(function (a, b) {
                            if (a[cfg.sortOrder] < b[cfg.sortOrder]) {
                                return cfg.sortDir === 'asc' ? -1 : 1;
                            }
                            if (a[cfg.sortOrder] > b[cfg.sortOrder]) {
                                return cfg.sortDir === 'asc' ? 1 : -1;
                            }
                            return 0;
                        });
                    }
                    // trim it down
                    if (cfg.maxSuggestions && cfg.maxSuggestions > 0) {
                        newSuggestions = newSuggestions.slice(0, cfg.maxSuggestions);
                    }
                    // build groups
                    if (cfg.groupBy !== null) {
                        _groups = {};
                        $.each(newSuggestions, function (index, value) {
                            if (_groups[value[cfg.groupBy]] === undefined) {
                                _groups[value[cfg.groupBy]] = {
                                    title: value[cfg.groupBy],
                                    items: [value]
                                };
                            } else {
                                _groups[value[cfg.groupBy]].items.push(value);
                            }
                        });
                    }
                    return newSuggestions;
                },

                /**
                 * Update the helper text
                 * @private
                 */
                _updateHelper: function (html) {
                    ms.helper.html(html);
                    if (!ms.helper.is(":visible")) {
                        ms.helper.fadeIn();
                    }
                }
            };

            var handlers = {
                /**
                 * Triggered when blurring out of the component
                 * @private
                 */
                _onBlur: function () {
                    ms.container.removeClass('tag-ctn-bootstrap-focus');
                    ms.collapse();
                    _hasFocus = false;
                    if (ms.getRawValue() !== '' && cfg.allowFreeEntries === true) {
                        var obj = {};
                        obj[cfg.displayField] = obj[cfg.valueField] = ms.getRawValue();
                        ms.addToSelection(obj);
                    }
                    self._renderSelection();

                    if (ms.isValid() === false) {
                        ms.container.addClass('tag-ctn-invalid');
                    }

                    if (ms.input.val() === '' && _selection.length === 0) {
                        ms.input.addClass(cfg.emptyTextCls);
                        ms.input.val(cfg.emptyText);
                    } else if (ms.input.val() !== '' && cfg.allowFreeEntries === false) {
                        ms.empty();
                        self._updateHelper('');
                    }

                    if (ms.input.is(":focus")) {
                        $(ms).trigger('blur', [ms]);
                    }
                },

                /**
                 * Triggered when hovering an element in the combo
                 * @param e
                 * @private
                 */
                _onComboItemMouseOver: function (e) {
                    ms.combobox.children().removeClass('tag-res-item-active');
                    $(e.currentTarget).addClass('tag-res-item-active');
                },

                /**
                 * Triggered when an item is chosen from the list
                 * @param e
                 * @private
                 */
                _onComboItemSelected: function (e) {
                    self._selectItem($(e.currentTarget));
                },

                /**
                 * Triggered when focusing on the container div. Will focus on the input field instead.
                 * @private
                 */
                _onFocus: function () {
                    ms.input.focus();
                },

                /**
                 * Triggered when clicking on the input text field
                 * @private
                 */
                _onInputClick: function () {
                    if (ms.isDisabled() === false && _hasFocus) {
                        if (cfg.toggleOnClick === true) {
                            if (cfg.expanded) {
                                ms.collapse();
                            } else {
                                ms.expand();
                            }
                        }
                    }
                },

                /**
                 * Triggered when focusing on the input text field.
                 * @private
                 */
                _onInputFocus: function () {
                    if (ms.isDisabled() === false && !_hasFocus) {
                        _hasFocus = true;
                        ms.container.addClass('tag-ctn-bootstrap-focus');
                        ms.container.removeClass(cfg.invalidCls);

                        if (ms.input.val() === cfg.emptyText) {
                            ms.empty();
                        }

                        var curLength = ms.getRawValue().length;
                        if (cfg.expandOnFocus === true) {
                            ms.expand();
                        }

                        if (_selection.length === cfg.maxSelection) {
                            self._updateHelper(cfg.maxSelectionRenderer.call(this, _selection
                                .length));
                        } else if (curLength < cfg.minChars) {
                            self._updateHelper(cfg.minCharsRenderer.call(this, cfg.minChars -
                                curLength));
                        }

                        self._renderSelection();
                        $(ms).trigger('focus', [ms]);
                    }
                },

                /**
                 * Triggered when the user presses a key while the component has focus
                 * This is where we want to handle all keys that don't require the user input field
                 * since it hasn't registered the key hit yet
                 * @param e keyEvent
                 * @private
                 */
                _onKeyDown: function (e) {
                    // check how tab should be handled
                    var active = ms.combobox.find('.tag-res-item-active:first'),
                        freeInput = ms.input.val() !== cfg.emptyText ? ms.input.val() : '';
                    $(ms).trigger('keydown', [ms, e]);

                    if (e.keyCode === 9 && (cfg.useTabKey === false ||
                            (cfg.useTabKey === true && active.length === 0 && ms.input.val()
                                .length === 0))) {
                        handlers._onBlur();
                        return;
                    }
                    switch (e.keyCode) {
                        case 8: //backspace
                            if (freeInput.length === 0 && ms.getSelectedItems().length > 0 && cfg
                                .selectionPosition === 'inner') {
                                _selection.pop();
                                self._renderSelection();
                                $(ms).trigger('selectionchange', [ms, ms.getSelectedItems()]);
                                ms.input.focus();
                                e.preventDefault();
                            }
                            break;
                        case 9: // tab
                        case 188: // esc
                        case 13: // enter
                            e.preventDefault();
                            break;
                        case 17: // ctrl
                            _ctrlDown = true;
                            break;
                        case 40: // down
                            e.preventDefault();
                            self._moveSelectedRow("down");
                            break;
                        case 38: // up
                            e.preventDefault();
                            self._moveSelectedRow("up");
                            break;
                        default:
                            if (_selection.length === cfg.maxSelection) {
                                e.preventDefault();
                            }
                            break;
                    }
                },

                /**
                 * Triggered when a key is released while the component has focus
                 * @param e
                 * @private
                 */
                _onKeyUp: function (e) {
                    var freeInput = ms.getRawValue(),
                        inputValid = $.trim(ms.input.val()).length > 0 && ms.input.val() !== cfg
                        .emptyText &&
                        (!cfg.maxEntryLength || $.trim(ms.input.val()).length <= cfg
                            .maxEntryLength),
                        selected,
                        obj = {};

                    $(ms).trigger('keyup', [ms, e]);

                    clearTimeout(_timer);

                    // collapse if escape, but keep focus.
                    if (e.keyCode === 27 && cfg.expanded) {
                        ms.combobox.height(0);
                    }
                    // ignore a bunch of keys
                    if ((e.keyCode === 9 && cfg.useTabKey === false) || (e.keyCode > 13 && e
                            .keyCode < 32)) {
                        if (e.keyCode === 17) {
                            _ctrlDown = false;
                        }
                        return;
                    }
                    switch (e.keyCode) {
                        case 40:
                        case 38: // up, down
                            e.preventDefault();
                            break;
                        case 13:
                        case 9:
                        case 188: // enter, tab, comma
                            if (e.keyCode !== 188 || cfg.useCommaKey === true) {
                                e.preventDefault();
                                if (cfg.expanded ===
                                    true
                                ) { // if a selection is performed, select it and reset field
                                    selected = ms.combobox.find('.tag-res-item-active:first');
                                    if (selected.length > 0) {
                                        self._selectItem(selected);
                                        return;
                                    }
                                }
                                // if no selection or if freetext entered and free entries allowed, add new obj to selection
                                if (inputValid === true && cfg.allowFreeEntries === true) {
                                    obj[cfg.displayField] = obj[cfg.valueField] = freeInput;
                                    ms.addToSelection(obj);
                                    ms.collapse(); // reset combo suggestions
                                    ms.input.focus();
                                }
                                break;
                            }
                            default:
                                if (_selection.length === cfg.maxSelection) {
                                    self._updateHelper(cfg.maxSelectionRenderer.call(this,
                                        _selection.length));
                                } else {
                                    if (freeInput.length < cfg.minChars) {
                                        self._updateHelper(cfg.minCharsRenderer.call(this, cfg
                                            .minChars - freeInput.length));
                                        if (cfg.expanded === true) {
                                            ms.collapse();
                                        }
                                    } else if (cfg.maxEntryLength && freeInput.length > cfg
                                        .maxEntryLength) {
                                        self._updateHelper(cfg.maxEntryRenderer.call(this, freeInput
                                            .length - cfg.maxEntryLength));
                                        if (cfg.expanded === true) {
                                            ms.collapse();
                                        }
                                    } else {
                                        ms.helper.hide();
                                        if (cfg.minChars <= freeInput.length) {
                                            _timer = setTimeout(function () {
                                                if (cfg.expanded === true) {
                                                    self._processSuggestions();
                                                } else {
                                                    ms.expand();
                                                }
                                            }, cfg.typeDelay);
                                        }
                                    }
                                }
                                break;
                    }
                },

                /**
                 * Triggered when clicking upon cross for deletion
                 * @param e
                 * @private
                 */
                _onTagTriggerClick: function (e) {
                    ms.removeFromSelection($(e.currentTarget).data('json'));
                },

                /**
                 * Triggered when clicking on the small trigger in the right
                 * @private
                 */
                _onTriggerClick: function () {
                    if (ms.isDisabled() === false && !(cfg.expandOnFocus === true && _selection
                            .length === cfg.maxSelection)) {
                        $(ms).trigger('triggerclick', [ms]);
                        if (cfg.expanded === true) {
                            ms.collapse();
                        } else {
                            var curLength = ms.getRawValue().length;
                            if (curLength >= cfg.minChars) {
                                ms.input.focus();
                                ms.expand();
                            } else {
                                self._updateHelper(cfg.minCharsRenderer.call(this, cfg.minChars -
                                    curLength));
                            }
                        }
                    }
                }
            };

            // startup point
            if (element !== null) {
                self._render(element);
            }
        };

        $.fn.tagSuggest = function (options) {
            var obj = $(this);

            if (obj.length === 1 && obj.data('tagSuggest')) {
                return obj.data('tagSuggest');
            }

            obj.each(function (i) {
                // assume $(this) is an element
                var cntr = $(this);

                // Return early if this element already has a plugin instance
                if (cntr.data('tagSuggest')) {
                    return;
                }

                if (this.nodeName.toLowerCase() === 'select') { // rendering from select
                    options.data = [];
                    options.value = [];
                    $.each(this.children, function (index, child) {
                        if (child.nodeName && child.nodeName.toLowerCase() === 'option') {
                            options.data.push({
                                id: child.value,
                                name: child.text
                            });
                            if (child.selected) {
                                options.value.push(child.value);
                            }
                        }
                    });

                }

                var def = {};
                // set values from DOM container element
                $.each(this.attributes, function (i, att) {
                    def[att.name] = att.value;
                });
                var field = new TagSuggest(this, $.extend(options, def));
                cntr.data('tagSuggest', field);
                field.container.data('tagSuggest', field);
            });

            if (obj.length === 1) {
                return obj.data('tagSuggest');
            }
            return obj;
        };

        //    $.fn.tagSuggest.defaults = {};
    });


    $(document).ready(function () {
        // var jsonData = [];
        // var fruits = 'Apple,Orange,Banana,Strawberry'.split(',');
        // for(var i=0;i<fruits.length;i++) jsonData.push({id:i,name:fruits[i]});
        $.ajax({ //create an ajax request to display.php
            type: "GET",
            url: "/get_symptoms_list",
            data: {
                _token: '{{ csrf_token() }}'
            },
            cache: false,
            dataType: 'json',
            success: function (jdata) {
                // console.log(jdata[2]);
                var sel_symp = $('#sel_symp').tagSuggest({
                    data: jdata,
                    sortOrder: 'name',
                    maxDropHeight: 200,
                    name: 'sel_symp'
                });
            }
        });

        $('#btn_get_cond_suggest').click(function () {
            var sel_symp = $('#sel_symp-get').val().split(',');

            console.log(sel_symp);
            // console.log(Array.isArray(sel_symp));
            // console.log(typeof sel_symp);

            // get list of conditions suggestions and its cf value
            get_cond_suggest(sel_symp);

            //get medical condition list
            $.ajax({
                type: "GET",
                url: "/get_conditions_list",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',
                success: function (jdata) {
                    // console.log(jdata[2]);
                    var sel_cond = $('#sel_cond').tagSuggest({
                        data: jdata,
                        sortOrder: 'name',
                        maxDropHeight: 200,
                        name: 'sel_cond'
                    });
                }
            });


        });

        $('#cond_suggestion').on("click", ".btn_get_presc_suggest", function () {
            var sel_cond = $('#sel_cond-get').val().split(',');
            console.log("presse");

            console.log(sel_cond);

            // get list of prescs suggestions and its cf value
            get_presc_suggest(sel_cond);

            // get prescs list for input
            $.ajax({
                type: "GET",
                url: "/get_prescriptions_list",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',
                success: function (jdata) {
                    // console.log(jdata[2]);
                    var sel_presc = $('#sel_presc').tagSuggest({
                        data: jdata,
                        sortOrder: 'name',
                        maxDropHeight: 200,
                        name: 'sel_presc'
                    });
                }
            });


        });

    });

    function get_cond_suggest(sel_symp) {
        $.ajax({
            url: '/dentist/get_cond_suggest/' + sel_symp,
            data: ({
                sel_symp: sel_symp
            }),
            type: 'get',
            dataType: 'json',
            success: function (response) {

                var len = 0;
                $('#cond_suggestion').empty(); // Empty <tbody>
                if (response != null) {
                    len = response.length;
                }

                $("#cond_suggestion").append("<hr>");
                var card =
                    '<div class="card text-white bg-suggest">' +
                    '<div class="card-header">Possible Medical Conditions</div>' +
                    '<div class="card-body">' +
                    '<table id="cond_suggestion_table" class="table table-bordered table-responsive-sm"><thead><th>No.</th><th>Prescription</th><th>Certainty Factor</th></thead>';
                $("#cond_suggestion").append(card);

                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        var name = response[i][0];
                        var cf = response[i][1];

                        var tr_str = '<tr>' +
                            "<td>" + (i + 1) + " </td>" +
                            "<td> " + name + "</td>" +
                            "<td> " + cf + "</td>" +
                            "</tr></table>";

                        $("#cond_suggestion_table").append(tr_str);
                    }
                } else {
                    var tr_str = "<tr>" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";

                    $("#cond_suggestion_table").append(tr_str);
                }

                //html for input medical conditions
                var str_input_cond = "<br><span>Enter Medical Conditions :</span><br><br>" +
                    '<input id="sel_cond" class="tag-ctn" style="width:400px;" type="text" name="sel_cond" /><br>' +
                    '<div class="text-right"><button type="button" class="btn btn-success btn_get_presc_suggest">Submit</button></div>'

                '<br><div id="presc_suggestion">' +
                "</div>";

                $("#cond_suggestion").append(str_input_cond);

                console.log(response);
            }
        });
    }

    function get_presc_suggest(sel_cond) {
        $.ajax({
            url: '/dentist/get_presc_suggest/' + sel_cond,
            data: ({
                sel_cond: sel_cond
            }),
            type: 'get',
            dataType: 'json',
            success: function (response) {

                var len = 0;
                $('#presc_suggestion').empty(); // Empty <tbody>
                if (response != null) {
                    len = response.length;
                }

                $("#presc_suggestion").append("<hr>");
                var card =
                    '<div class="card text-white bg-suggest">' +
                    '<div class="card-header">Possible Prescriptions</div>' +
                    '<div class="card-body">' +
                    '<table id="presc_suggestion_table" class="table table-bordered table-responsive-sm"><thead><th>No.</th><th>Prescription</th><th>Certainty Factor</th></thead>';
                $("#presc_suggestion").append(card);

                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        var name = response[i][0];
                        var cf = response[i][1];

                        var tr_str = '<tr>' +
                            "<td>" + (i + 1) + " </td>" +
                            "<td> " + name + "</td>" +
                            "<td> " + cf + "</td>" +
                            "</tr>";

                        $("#presc_suggestion_table").append(tr_str);
                    }
                } else {
                    var tr_str = "<tr>" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";

                    $("#presc_suggestion_table").append(tr_str);
                }

                var str_input_cond = "<br><span>Enter Prescriptions : </span><br><br>" +
                    '<input id="sel_presc" class="tag-ctn" style="width:400px;" type="text" name="sel_presc" /><br>' +
                    '<div class="text-right"><button type="submit" class="btn btn-info">Save & Continue</button></div>';

                $("#presc_suggestion").append(str_input_cond);

                console.log(response);
            }
        });
    }

</script>
@endpush
