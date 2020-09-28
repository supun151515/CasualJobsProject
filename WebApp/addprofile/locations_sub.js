       $(document).ready(function () {
                var url = "locations_sub.php";
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'id' },
                        { name: 'location' }
                    ],
                    url: url,
                    async: false,
                    type:'POST'
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxDropDownList
                $("#location_sub").jqxDropDownList({
                    checkboxes: true, placeHolder: "Select a sub location", filterable: true, source: dataAdapter, displayMember: "location", valueMember: "id", width: 315, height: 30,
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