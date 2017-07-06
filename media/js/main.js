// functions
function getInfoMessage(message) {
	var $infoMessage = $('#infoMessage');
	$infoMessage.find('div[data-content="message"]').html(message);
	$infoMessage.modal('show');
	return true;
}

function refreshGrid(auto) {
    w2ui.grid.autoLoad = auto;
    w2ui.grid.skip(0);
}

// variables 
	var $smartContractModal = $('#smartContractModal'),
		$smartContractForm = $smartContractModal.find('form'),
		$statisticsTable = $('#statisticsTable'),
		currentTableSelection;

// widget configuration
var config = {
    grid: { 
        name: 'grid',
        url : API_statistics_table,
		multiSelect : true,
		selectType : 'row',
        show: { 
            footer    : true,
            toolbar    : true,
			selectColumn: true,
			toolbarInput: false
        },
        columns: [                
			{ field: 'chain_type', caption: 'Type of wallet', size: '4%', sortable: true, resizable: true },
			{ field: 'chain_addr', caption: 'Wallet address', size: '24%', sortable: true, resizable: true },
            { field: 'chain_balance', caption: 'Current balance', size: '12%', resizable: true, sortable: true },
            { field: 'chain_balance_prev', caption: 'Previous balance', size: '12%', resizable: true, sortable: true },
            { field: 'zbr_addr', caption: 'ZBR', size: '20%', sortable: true, resizable: true },
            { field: 'zbr_balance', caption: 'ZBR balance', size: '12%', sortable: true, resizable: true }
        ],
		toolbar: {
			/* items: [
				{ 
					type: 'button', 
					id: 'smartContract', 
					caption: 'Custom SmartContract', 
					img: 'icon-page',
					onClick: function(){
						currentTableSelection = w2ui['grid'].getSelection();
						if(currentTableSelection.length > 0) {
							$smartContractModal.modal('show');
						} else {
							getInfoMessage('First you need to select at least one account.');
						}
					}
				}
			],
			onClick: function (target, data) {
				console.log(target);
			}*/
		},
    }
};

// onload
/*
$(function () {
    $statisticsTable.w2grid(config.grid);
	  $smartContractForm.submit(function(eObj){
		var data = new FormData($smartContractForm[0]);
		
		data.append('selection', currentTableSelection);
		
		$.ajax({
			url: API_update_contract,
			data: data,
			dataType: "json",
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$smartContractModal.modal('hide');
				if(data.success) {
					getInfoMessage('The command has been added to the queue.');
				} else {
					getInfoMessage(data.error);
				}
			}
		});
		
		return false;
	});
});
*/

//http://w2ui.com/web/demos/#!combo/combo-9