/**
 * Shortcode Bootstrap Visuals TinyMCE Buttons
 *
 * Custom Javascript functions for the Bootstrap Visuals plugin.
 *
 * @author George Lewe
 * @link https://www.lewe.com
 *
 * @package Shortcode Bootstrap Visuals
 * @subpackage Scripts
 * @since 1.2.0
 */
(function () {
    tinymce.PluginManager.add('bsvbtn', function (editor, url) {
        //
        // Submenu Array
        //
        var menu_array = [];

        //
        // Alert
        //
        menu_array.push({
            text: "Alert",
            value: '[bsv-alert style="primary" heading="" dismissible="no" width="100%"]%content%[/bsv-alert]',
            onclick: function () {
                var selected_text = editor.selection.getContent({ 'format': 'html' });
                return_text = this.value().replace("%content%", selected_text);
                editor.execCommand('mceReplaceContent', false, return_text);
            }
        });

        //
        // Badge
        //
        menu_array.push({
            text: "Badge",
            value: '[bsv-badge style="primary" type="badge" displayas="" prefix="" buttonlink="" target="_self" customtextcolor="" custombgcolor=""]%content%[/bsv-badge]',
            onclick: function () {
                var selected_text = editor.selection.getContent({ 'format': 'html' });
                return_text = this.value().replace("%content%", selected_text);
                editor.execCommand('mceReplaceContent', false, return_text);
            }
        });

        //
        // Blockquote
        //
        menu_array.push({
            text: "Blockquote",
            value: '[bsv-blockquote source="" sourceurl="" title=""]%content%[/bsv-blockquote]',
            onclick: function () {
                var selected_text = editor.selection.getContent({ 'format': 'html' });
                return_text = this.value().replace("%content%", selected_text);
                editor.execCommand('mceReplaceContent', false, return_text);
            }
        });

        //
        // Button
        //
        menu_array.push({
            text: "Button",
            value: '[bsv-button style="primary" size="" link="" target="_self" tooltip="no" outline="no" customtextcolor="" custombgcolor=""]%content%[/bsv-button]',
            onclick: function () {
                var selected_text = editor.selection.getContent({ 'format': 'html' });
                return_text = this.value().replace("%content%", selected_text);
                editor.execCommand('mceReplaceContent', false, return_text);
            }
        });

        //
        // Button Group
        //
        menu_array.push({
            text: "Button Group",
            value: '[bsv-button-group styles=""]%content%[/bsv-button-group]',
            onclick: function () {
                var selected_text = editor.selection.getContent({ 'format': 'html' });
                return_text = this.value().replace("%content%", selected_text);
                editor.execCommand('mceReplaceContent', false, return_text);
            }
        });

        //
        // Callout
        //
        menu_array.push({
            text: "Callout",
            value: '[bsv-callout style="primary" heading="" headinglevel="h4"]%content%[/bsv-callout]',
            onclick: function () {
                var selected_text = editor.selection.getContent({ 'format': 'html' });
                return_text = this.value().replace("%content%", selected_text);
                editor.execCommand('mceReplaceContent', false, return_text);
            }
        });

        //
        // Card
        //
        menu_array.push({
            text: "Card",
            value: '[bsv-card style="primary" heading="" headinglevel="h4" title="" titlelevel="h4" subtitle="" subtitlelevel="h5" width="" floatleft="no" outline="no" img="" footer=""]%content%[/bsv-card]',
            onclick: function () {
                var selected_text = editor.selection.getContent({ 'format': 'html' });
                return_text = this.value().replace("%content%", selected_text);
                editor.execCommand('mceReplaceContent', false, return_text);
            }
        });

        //
        // Jumbotron
        //
        menu_array.push({
            text: "Jumbotron",
            value: '[bsv-jumbotron heading="" headingsize="4" lead=""]%content%[/bsv-jumbotron]',
            onclick: function () {
                var selected_text = editor.selection.getContent({ 'format': 'html' });
                return_text = this.value().replace("%content%", selected_text);
                editor.execCommand('mceReplaceContent', false, return_text);
            }
        });

        //
        // Panel
        //
        menu_array.push({
            text: "Panel",
            value: '[bsv-panel textstyle="primary" bgstyle="light" bordertop="yes" borderright="yes" borderbottom="yes" borderleft="yes" borderstyle="" borderradius="rounded" id="" classes="" styles="padding:12px;"]%content%[/bsv-panel]',
            onclick: function () {
                var selected_text = editor.selection.getContent({ 'format': 'html' });
                return_text = this.value().replace("%content%", selected_text);
                editor.execCommand('mceReplaceContent', false, return_text);
            }
        });

        //
        // Progress Bar
        //
        menu_array.push({
            text: "Progress Bar",
            value: '[bsv-progress animated="no" id="" progress="75" striped="no" style="primary" width="100%"]',
            onclick: function () {
                editor.insertContent(this.value());
            }
        });

        //
        // Spinner
        //
        menu_array.push({
            text: "Spinner",
            value: '[bsv-spinner button="no" buttontext="" shape="border" size="normal" style="primary"]',
            onclick: function () {
                editor.insertContent(this.value());
            }
        });

        //
        // Table (4x3)
        //
        menu_array.push({
            text: "Table (4x3, light)",
            value: '<table class="bsv-table bsv-table-hover"><thead><tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr></thead><tbody><tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td></tr><tr><th scope="row">2</th><td>Jacob</td><td>Thornton</td><td>@fat</td></tr><tr><th scope="row">3</th><td colspan="2">Larry the Bird</td><td>@twitter</td></tr></tbody></table>',
            onclick: function () {
                editor.insertContent(this.value());
            }
        });

        menu_array.push({
            text: "Table (4x3, dark)",
            value: '<table class="bsv-table bsv-table-hover bsv-table-dark"><thead><tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr></thead><tbody><tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td></tr><tr><th scope="row">2</th><td>Jacob</td><td>Thornton</td><td>@fat</td></tr><tr><th scope="row">3</th><td colspan="2">Larry the Bird</td><td>@twitter</td></tr></tbody></table>',
            onclick: function () {
                editor.insertContent(this.value());
            }
        });

        //
        // Separator
        //
        menu_array.push({
            text: "---",
            value: '',
            onclick: function () { }
        });

        //
        // Documentation
        //
        menu_array.push({
            text: "Documentation...",
            value: '',
            onclick: function () { window.open('https://lewe.gitbook.io/lewe-bootstrap-visuals/', '_blank'); }
        });

        //
        // Add the submenu button
        //
        editor.addButton('bsvbtn', {
            title: 'Bootstrap Visuals',
            type: 'menubutton',
            image: url + '/bsvbtn.png',
            menu: menu_array
        });

        //
        // Single menu button
        //
        // editor.addButton('bsvbtn', {
        //    title: 'Bootstrap Visuals - Click button to add a Shortcoe',
        //    cmd: 'bsvbtn',
        //    image: url + '/bsvbtn.png',
        // });

        // editor.addCommand('bsvbtn', function() {
        //    var selected_text = editor.selection.getContent({
        //       'format': 'html'
        //    });
        //    var open_column = '[bs-alert]' + selected_text + '[/bsv-alert]';
        //    var close_column = '';
        //    var return_text = '';
        //    return_text = open_column + close_column;
        //    editor.execCommand('mceReplaceContent', false, return_text);
        //    return;
        // });

    });
})();