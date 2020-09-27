       $(document).ready(function () {
                var url = "locations.php";
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
                $("#location").jqxDropDownList({
                    placeHolder: "Select a location", filterable: true, source: dataAdapter, displayMember: "location", valueMember: "id", width: 315, height: 30,
                });
                // subscribe to the select event.
                $("#location").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                           var url = "locations_sub.php?id="+item.value;
                // prepare the data
                            var source2 =
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
                                var dataAdapter2 = new $.jqx.dataAdapter(source2); 
                                $("#location_sub").jqxDropDownList({
                                    placeHolder: "Select a sub location", filterable: true, source: dataAdapter2, displayMember: "location", valueMember: "id", width: 315, height: 30,
                                });
                                $("#location_sub_group").show();
                        }
                    }
                });
            });