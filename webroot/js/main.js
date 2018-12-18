
function listen(event, el, func) {
	if (el.addEventListener)  // W3C DOM
		el.addEventListener(event, func, false);
	else if (el.attachEvent) { // IE DOM
		var r = el.attachEvent('on'+event, func);
		return r;
    }
}

var init = function() {
	
	//---- Flashes
	var flash = document.getElementById('flash');
    if(flash) {
	    window.setTimeout( function() {
			flash.classList.add('hidden');
		}, 2500)
	};
	
	//---- GroupMailing Form
	var filterButton = document.getElementById('filterButton');
	var filterSelection = document.getElementById('filterSelection');
	
	if(filterSelection) {		
		console.info('Filter form detected');
		
		var filterInputs = {
			creationDate : {
				selection : document.getElementById('creationDateSelection'),
				since : document.getElementById('creationDateSinceInput'),
				before : document.getElementById('creationDateBeforeInput'),
				between : {
					min : document.getElementById('creationDateBetweenMinInput'),
					max : document.getElementById('creationDateBetweenMaxInput')
				}
			},
			age : {
				selection : document.getElementById('ageSelection'),
				younger : document.getElementById('ageYoungerInput'),
				older : document.getElementById('ageOlderInput'),
				between : {
					min : document.getElementById('ageBetweenMinInput'),
					max : document.getElementById('ageBetweenMaxInput')
				}
			},
			gender : {
				selection : document.getElementById('genderSelection')
			},
			rating : {
				selection : document.getElementById('ratingSelection'),
				equal : document.getElementById('ratingEqualToInput'),
				lower : document.getElementById('ratingLowerThanInput'),
				higher : document.getElementById('ratingHigherThanInput'),
				between : {
					min : document.getElementById('ratingBetweenMinInput'),
					max : document.getElementById('ratingBetweenMaxInput')
				}
			},
			artist : {
				selection : document.getElementById('artistInput')
			}
		}
		
		function display(el, force = '', customClass = 'hidden') {
			if(force == '') {
				el.classList.forEach(function(item) {
					if(item == customClass) {
						el.classList.remove(customClass);
					} else {
						el.classList.add(customClass);
					}
				});
			}
			else if(force == 'hide') {
				el.classList.add('hidden');
			}
			else if(force == 'show') {
				el.classList.remove('hidden');
			}
		}
			
		function reset(fi = filterInputs) {
			display(fi.creationDate.selection.parentNode, 'hide');
			display(fi.creationDate.since.parentNode, 'hide');
			display(fi.creationDate.before.parentNode, 'hide');
			display(fi.creationDate.between.min.parentNode, 'hide');
			display(fi.creationDate.between.max.parentNode, 'hide');
			display(fi.age.selection.parentNode, 'hide');
			display(fi.age.younger.parentNode, 'hide');
			display(fi.age.older.parentNode, 'hide');
			display(fi.age.between.min.parentNode, 'hide');
			display(fi.age.between.max.parentNode, 'hide');
			display(fi.gender.selection.parentNode, 'hide');
			display(fi.rating.selection.parentNode, 'hide');
			display(fi.rating.equal.parentNode, 'hide');
			display(fi.rating.lower.parentNode, 'hide');
			display(fi.rating.higher.parentNode, 'hide');
			display(fi.rating.between.min.parentNode, 'hide');
			display(fi.rating.between.max.parentNode, 'hide');
			display(fi.artist.selection.parentNode, 'hide');
			fi.creationDate.selection.selectedIndex = 0;
			fi.age.selection.selectedIndex = 0;
			fi.gender.selection.selectedIndex = 0;
			fi.rating.selection.selectedIndex = 0;
		}
		
		listen('change', filterSelection, function() {

			//Reset
			if(this.value == 0) {
				reset();
			}
			
			//Creation date
			else if(this.value == 1) {
				reset();
				display(filterInputs.creationDate.selection.parentNode);
				listen('change', filterInputs.creationDate.selection, function() {
					if(this.value == 0) {
						display(filterInputs.creationDate.since.parentNode, 'hide');
						display(filterInputs.creationDate.before.parentNode, 'hide');
						display(filterInputs.creationDate.between.min.parentNode, 'hide');
						display(filterInputs.creationDate.between.max.parentNode, 'hide');
					}
					else if(this.value == 1) {
						display(filterInputs.creationDate.since.parentNode, 'show');
						display(filterInputs.creationDate.before.parentNode, 'hide');
						display(filterInputs.creationDate.between.min.parentNode, 'hide');
						display(filterInputs.creationDate.between.max.parentNode, 'hide');
					}
					else if(this.value == 2) {
						display(filterInputs.creationDate.since.parentNode, 'hide');
						display(filterInputs.creationDate.before.parentNode, 'show');
						display(filterInputs.creationDate.between.min.parentNode, 'hide');
						display(filterInputs.creationDate.between.max.parentNode, 'hide');
					}
					else if(this.value == 3) {
						display(filterInputs.creationDate.since.parentNode, 'hide');
						display(filterInputs.creationDate.before.parentNode, 'hide');
						display(filterInputs.creationDate.between.min.parentNode, 'show');
						display(filterInputs.creationDate.between.max.parentNode, 'show');
					}
				});
			}
			
			//Age
			else if(this.value == 2) {
				reset();
				display(filterInputs.age.selection.parentNode);
				listen('change', filterInputs.age.selection, function() {
					if(this.value == 0) {
						display(filterInputs.age.younger.parentNode, 'hide');
						display(filterInputs.age.older.parentNode, 'hide');
						display(filterInputs.age.between.min.parentNode, 'hide');
						display(filterInputs.age.between.max.parentNode, 'hide');
					}
					else if(this.value == 1) {
						display(filterInputs.age.younger.parentNode);
						display(filterInputs.age.older.parentNode, 'hide');
						display(filterInputs.age.between.min.parentNode, 'hide');
						display(filterInputs.age.between.max.parentNode, 'hide');
					}
					else if(this.value == 2) {
						display(filterInputs.age.younger.parentNode, 'hide');
						display(filterInputs.age.older.parentNode, 'show');
						display(filterInputs.age.between.min.parentNode, 'hide');
						display(filterInputs.age.between.max.parentNode, 'hide');
					}
					else if(this.value == 3) {
						display(filterInputs.age.younger.parentNode, 'hide');
						display(filterInputs.age.older.parentNode, 'hide');
						display(filterInputs.age.between.min.parentNode, 'show');
						display(filterInputs.age.between.max.parentNode, 'show');
					}
				});
			}
			
			//Gender
			else if(this.value == 3) {
				reset();
				display(filterInputs.gender.selection.parentNode);
			}
			
			//Rating
			else if(this.value == 4) {
				reset();
				display(filterInputs.rating.selection.parentNode);
				listen('change', filterInputs.rating.selection, function() {
					if(this.value == 0) {
						display(filterInputs.rating.equal.parentNode, 'hide');
						display(filterInputs.rating.lower.parentNode, 'hide');
						display(filterInputs.rating.higher.parentNode, 'hide');
						display(filterInputs.rating.between.min.parentNode, 'hide');
						display(filterInputs.rating.between.max.parentNode, 'hide');
					}
					else if(this.value == 1) {
						display(filterInputs.rating.equal.parentNode, 'show');
						display(filterInputs.rating.lower.parentNode, 'hide');
						display(filterInputs.rating.higher.parentNode, 'hide');
						display(filterInputs.rating.between.min.parentNode, 'hide');
						display(filterInputs.rating.between.max.parentNode, 'hide');
					}
					else if(this.value == 2) {
						display(filterInputs.rating.equal.parentNode, 'hide');
						display(filterInputs.rating.lower.parentNode, 'hide');
						display(filterInputs.rating.higher.parentNode, 'show');
						display(filterInputs.rating.between.min.parentNode, 'hide');
						display(filterInputs.rating.between.max.parentNode, 'hide');
					}
					else if(this.value == 3) {
						display(filterInputs.rating.equal.parentNode, 'hide');
						display(filterInputs.rating.lower.parentNode, 'show');
						display(filterInputs.rating.higher.parentNode, 'hide');
						display(filterInputs.rating.between.min.parentNode, 'hide');
						display(filterInputs.rating.between.max.parentNode, 'hide');
					}
					else if(this.value == 4) {
						display(filterInputs.rating.equal.parentNode, 'hide');
						display(filterInputs.rating.lower.parentNode, 'hide');
						display(filterInputs.rating.higher.parentNode, 'hide');
						display(filterInputs.rating.between.min.parentNode, 'show');
						display(filterInputs.rating.between.max.parentNode, 'show');
					}
				});
			}
			
			//Artist
			else if(this.value == 5) {
				reset();
				display(filterInputs.artist.selection.parentNode);
			}
		});
		
		listen('click', filterButton, function(e) {
			e.preventDefault();
			var filterList = document.getElementById('filterList');
			var selectedInputs = [];
			var error = false;
			var filterInputs = document.getElementsByClassName('floatInput');
			for(var i = 0; i < filterInputs.length; i++) {
				var hidden = false;
				for(var j = 0; j < filterInputs[i].parentNode.classList.length; j++) {
					if(filterInputs[i].parentNode.classList[j] == 'hidden') {
						hidden = true;
						break;
					}
				}
				if(!hidden) { selectedInputs.push(filterInputs[i]) }
			};
			var filterString = '';
			var firstLayer, secondLayer;
			selectedInputs.forEach(function(item, index) {
				var itemNumVal = parseInt(item.value);
				switch(index) {
					case 0 : // first layer
						switch(itemNumVal) {
							case 0 :
								error = 'No filter selected';
							break;
							case 1 :
								filterString += 'Customer has been added ';
							break;
							case 2 :
								filterString += 'Customer is ';
							break;
							case 3 :
								filterString += 'Customer is ';
							break;
							case 4 :
								filterString += 'Rating is ';
							break;
							case 5 :
								filterString += 'Artist is ';
							break;
						}
						firstLayer = itemNumVal;
					break;
					case 1 : // second layer
						switch(firstLayer) {
							case 0 : 
								error = 'No filter selected';
							break;
							case 1 : // if creation date
								switch(itemNumVal) {
									case 0 :
										error = 'No rule selected.';
									break;
									case 1 :
										filterString += 'since ';
									break;
									case 2 :
										filterString += 'before ';
									break;
									case 3 :
										filterString += 'between ';
									break;
								}
								secondLayer = itemNumVal;
							break;
							case 2 : // if age
								switch(itemNumVal) {
									case 0 :
										error = 'No filter selected';
									break;
									case 1 :
										filterString += 'younger than ';
									break;
									case 2 :
										filterString += 'older than ';
									break;
									case 3 :
										filterString += 'between ';
									break;
								}
								secondLayer = itemNumVal;
							break;
							case 3 : // if gender
								switch(itemNumVal) {
									case 0 :
										error = 'No filter selected';
									break;
									case 1 :
										filterString += 'a woman.';
									break;
									case 2 :
										filterString += 'a man.';
									break;
									case 3 :
										filterString += 'both genders.';
									break;
								}
								secondLayer = itemNumVal;
							break;
							case 4 : // if rating
								switch(itemNumVal) {
									case 0 :
										error = 'No filter selected';
									break;
									case 1 :
										filterString += 'equal to';
									break;
									case 2 :
										filterString += 'over ';
									break;
									case 3 :
										filterString += 'under ';
									break;
									case 4 :
										filterString += 'between ';
									break;
								}
								secondLayer = itemNumVal;
							break;
							case 5 : // if artist
								if(item.value !== '') {
									filterString += item.value;
								} else {
									error = 'No artists selected';
								}
								
							break;
						}
					break;
					case 2 : // third layer
						if(item.value !== '') {
							filterString += item.value;
						} else {
							if(firstLayer == 1) { error = 'No date selected'; }
							if(firstLayer == 2) { error = 'No age selected'; }
							if(firstLayer == 3) { error = 'No value selected'; }
						}
					
					break;
					case 3 : // forth layer
						if(item.value !== '') {
							filterString +=  ' and ' + item.value + '.';
						} else {
							if(firstLayer == 1) { error = 'No date selected'; }
							if(firstLayer == 2) { error = 'No age selected'; }
							if(firstLayer == 3) { error = 'No value selected'; }
						}
					
					break;
					case 4 : // out of range
						console.error('Input index out of range');
					break;
				}
			});
			if(!error) {
				var filterItemContainer = document.createElement('div');
				var filterItemContent = document.createTextNode(filterString);
				filterItemContainer.appendChild(filterItemContent);
				filterList.appendChild(filterItemContainer);
				reset();
				filterSelection.selectedIndex = 0;
			} else {
				console.error(error);
			}

		});
		
	}
}
        
listen('load', window, init);
