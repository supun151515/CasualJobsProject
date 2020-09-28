       $(document).ready(function () {
                var url = "specialized.php";
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'id' },
                        { name: 'specialized' }
                    ],
                    url: url,
                    async: false,
                    type:'POST'
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxDropDownList
                $("#specialized").jqxDropDownList({
                    placeHolder: "Select the Specialized Area", filterable: true, source: dataAdapter, displayMember: "specialized", valueMember: "id", width: 250, height: 30,
                });
                // subscribe to the select event.
                $("#jqxWidget").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                            var valueelement = $("<div></div>");
                            valueelement.text("Value: " + item.value);
                            var labelelement = $("<div></div>");
                            labelelement.text("Label: " + item.label);
                            $("#selectionlog").children().remove();
                            $("#selectionlog").append(labelelement);
                            $("#selectionlog").append(valueelement);
                        }
                    }
                });
            });