       $(document).ready(function () {
                var url = "jobTitles.php";
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'id' },
                        { name: 'jobTitle' }
                    ],
                    url: url,
                    async: false,
                    type:'POST'
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxDropDownList
                $("#jobTitle").jqxDropDownList({
                    checkboxes: true, placeHolder: "Select a job title", filterable: true, source: dataAdapter, displayMember: "jobTitle", valueMember: "id", width: 315, height: 30,
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