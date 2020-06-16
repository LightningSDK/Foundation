( function() {
    CKEDITOR.plugins.add( 'foundation-columns', {
        init: function( editor ) {
            editor.ui.addRichCombo('photogalleries', {
                label: "Column Layout",
                title: "Column Layout",
                multiSelect: false,

                init: function () {
                    this.add("12");
                    this.add("6,6");
                    this.add("4,8");
                    this.add("8,4");
                    this.add("3,6,3");
                    this.add("4,4,4");
                    this.add("6,3,3");
                    this.add("3,3,3,3");
                },

                onClick: function (value) {
                    editor.focus();
                    editor.fire('saveSnapshot');
                    var columns = value.split(',');
                    var html = '<div class="row">';
                    for (var i in columns) {
                        html += '<div class="medium-' + columns[i] + ' column"></div>';
                    }
                    html += '</div>';
                    editor.insertHtml(html);
                    editor.fire('saveSnapshot');
                }
            });
        }
    });
} )();
