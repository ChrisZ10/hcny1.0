class Search {
	constructor() {
		this.inputField = jQuery('#search-term');
		this.resultsList = jQuery('#search-results');
		this.events();
		this.previousInput = "";
		this.isSearching = false;
	}
	// events
	events() {
		this.inputField.on("keyup", this.typeLogic.bind(this));
	}

	// methods
	typeLogic() {
		if (this.inputField.val() !== this.previousInput) {
			clearTimeout(this.timer);
			if (this.inputField.val()) {
				if (!this.isSearching) {
					this.resultsList.html('正在搜索');
					this.isSearching = true;
				}
				this.timer = setTimeout(this.getResults.bind(this), 1000);
			} else {
				this.resultsList.html('');
				this.isSearching = false;
			}
		}
		this.previousInput = this.inputField.val();
	}

	getResults() {
		
		jQuery.getJSON(site_data.site_url + '/wp-json/hcny/v1/search?keyword=' + this.inputField.val(), (results) => {
			this.resultsList.html(`
				<div class="columns">
					<div class="column">
						<h3 class="subtitle">頁面</h3>
						${results.pages.length? '<ul>' : ''}
							${results.pages.map((item) => `<li><a href="${item.permalink}">${item.title}</a></li>`).join('')}
						${results.pages.length? '</ul>' : ''}
					</div>
					<div class="column">
						<h3 class="subtitle">活動</h3>
						${results.events.length? '<ul>' : ''}
							${results.events.map((item) => `<li><a href="${item.permalink}">${item.title}</a></li>`).join('')}
						${results.events.length? '</ul>' : ''}
					</div>
					<div class="column">
						<h3 class="subtitle">消息</h3>
						${results.messages.length? '<ul>' : ''}
							${results.messages.map((item) => `<li><a href="${item.permalink}">${item.title}</a></li>`).join('')}
						${results.messages.length? '</ul>' : ''}
					</div>
				</div>
			`);
			this.isSearching = false;
		})
	}	

}

var search = new Search();