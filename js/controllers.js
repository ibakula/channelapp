App.run(function($rootScope){
    var x = new XMLHttpRequest();
    x.open("GET", "./packages/index.php", false);
    x.send(null);
    $rootScope.rowsPackage = JSON.parse(x.responseText);
    x.open("GET", "./channels/index.php", false);
    x.send(null);
    $rootScope.rowsChannel = JSON.parse(x.responseText);
});

App.controller("AddPackageController", function($scope, $rootScope){
	$scope.addPackage = function() {
		var name = $('#input-package-name');
		var price = $("#input-package-price");

		var data = {
			id: $rootScope.rowsPackage.length+1,
			name: name.val(),
			price: price.val()
		};

		name.val("");
		price.val("");
		$('.create-package-modal').modal('hide');

        $.post('./packages/index.php',
            {
                id:data.id,
                name:data.name,
                price:data.price
            });

		return $rootScope.rowsPackage.push(data);
	};

});

App.controller("PackageTableController", function($scope, $rootScope, $http){

	$scope.rowsPackage = $rootScope.rowsPackage;
    var id = 1;

    $scope.packageDelete = function(item) {
        var id = $(item.target).data('id');

        $.ajax({
            url: './packages/index.php',
            type: 'DELETE',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: { id:id }
        });

        id = id-1;

        return $rootScope.rowsPackage.splice(id, 1);
    };

	$scope.editModal = function(item) {
		$('.edit-package-modal').modal('show');
		id = $(item.target).data("id");
	};

	$scope.editPackage = function() {
		var name = $("#input-edit-package-name");
		var price = $("#input-edit-package-price");

		var data = {
            id: id,
            name: name.val(),
            price: price.val()
        };

		name.val("");
		price.val("");

		$('.edit-package-modal').modal('hide');

        $rootScope.rowsPackage.splice((data.id-1), 1);

		return $rootScope.rowsPackage.push(data);
	}

});

App.controller("AddChannelController", function($scope, $rootScope){
    $scope.addChannel = function() {
        var name = $('#input-channel-name');
        var packageId = $("#input-channel-packageId").text(this.innerHTML);
        var url = $("#input-channel-url");

        var data = {
            id: $rootScope.rowsChannel.length+1,
            name: name.val(),
            packageId: packageId.val(),
            url: url.val()
        };

        name.val("");
        packageId.val("");
        $('.create-channel-modal').modal('hide');

        $.post('./channels/index.php',
            {
                id:data.id,
                name:data.name,
                packageId:data.packageId,
                url:data.url
            });

        return $rootScope.rowsChannel.push(data);
    };

});

App.controller("ChannelTableController", function($scope, $rootScope){

    $scope.rowsChannel = $rootScope.rowsChannel;
    var id = 1;

    $scope.channelDelete = function(item) {
        var id = $(item.target).data('id');

        $.ajax({
            url: './channels/index.php',
            type: 'DELETE',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: { id:id }
        });

        id = id-1;

        return $rootScope.rowsChannel.splice(id, 1);
    };

    $scope.editChannelModal = function(item) {
        $('.edit-channel-modal').modal('show');
        id= $(item.target).data('id');
    };

    $scope.editChannel = function() {
        var name = $('#input-edit-channel-name');
        var packageId = $("#input-edit-channel-packageId").text(this.innerHTML);
        var url = $("#input-edit-channel-url");

        var data = {
            id: id,
            name: name.val(),
            packageId: packageId.val(),
            url: url.val()
        };

        name.val("");
        packageId.val("");

        $('.edit-channel-modal').modal('hide');

        $rootScope.rowsChannel.splice((data.id-1), 1);

        return $rootScope.rowsChannel.push(data);
    }

});
