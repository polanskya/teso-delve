class CraftingCalculator {

    constructor() {
        this.trait = null;
        this.material = null;
        this.materialCount = null;
        this.quality = null;
        this.researchLine = null;
        this.itemStyle = null;

        this.dom = {
            calculator: null,
            materials: null,
            tempers: null,
            itemStyles: null,
        };

    }

    init() {
        this.dom.calculator = document.querySelector('#crafting-calculator');
        this.dom.materials = this.dom.calculator.querySelectorAll('.material');
        this.dom.materialButtons = this.dom.calculator.querySelectorAll('.material a');
        this.dom.tempers = this.dom.calculator.querySelectorAll('.temper');
        this.dom.researchLines = this.dom.calculator.querySelectorAll('.research-line');
        this.dom.itemStyles = this.dom.calculator.querySelectorAll('.item-style');
        this.dom.traits = this.dom.calculator.querySelectorAll('.trait');

        var researchLine = this.dom.calculator.querySelector('.research-line.active');
        this.researchLine = researchLine.dataset.researchLine;

        this.showMaterialCounts();

        this.hookEvents();
    }

    hookEvents() {
        var that = this;

        this.dom.materials.addEventListener('click', that.setMaterial.bind(that));
        this.dom.materialButtons.addEventListener('click', that.updateMaterialCount.bind(that));
        this.dom.tempers.addEventListener('click', that.setTemper.bind(that));
        this.dom.researchLines.addEventListener('click', that.setResearchLine.bind(that));
        this.dom.itemStyles.addEventListener('click', that.setItemStyle.bind(that));
        this.dom.traits.addEventListener('click', that.setTrait.bind(that));
    }

    showMaterialCounts() {
        var craftingItems = this.dom.calculator.querySelectorAll('.crafting-items');
        var obj = this;

        craftingItems.forEach(function(element) {
            var children = element.querySelectorAll('.crafting-item');

            children.forEach(function(element) {
                element.classList.remove('active');
            });

            var researchLineItems = element.querySelectorAll('.crafting-item[data-research-line="'+obj.researchLine+'"]');
            researchLineItems[0].classList.add('active');
        });
    }

    activate(event) {
        event.currentTarget.classList.add('active');
    }

    disable(list) {
        list.forEach(function(element) {
            element.classList.remove('active');
        });
    }

    updateMaterialCount(e) {

        e.preventDefault();
    }

    setTrait(e) {
        this.disable(this.dom.traits);
        this.activate(e);
    }

    setItemStyle(e) {
        this.disable(this.dom.itemStyles);
        this.activate(e);
    }

    setResearchLine(e) {
        this.disable(this.dom.researchLines);
        this.activate(e);

        var itemType = e.currentTarget.dataset.itemtype;
        this.researchLine = e.currentTarget.dataset.researchLine;
        this.showMaterialCounts();

        this.dom.calculator.querySelector('.weapon-traits').classList.add('hidden');
        this.dom.calculator.querySelector('.armor-traits').classList.add('hidden');

        if(itemType == 'weapons') {
            this.dom.calculator.querySelector('.weapon-traits').classList.remove('hidden');
        }
        else {
            this.dom.calculator.querySelector('.armor-traits').classList.remove('hidden');

        }

    }

    setMaterial(e) {
        this.disable(this.dom.materials);
        this.activate(e);
    }

    setTemper(e) {
        this.disable(this.dom.tempers);
        this.activate(e);
    }

}


{
    var craftingCalculator = document.querySelector('#crafting-calculator');
    if (craftingCalculator) {
        var cc = new CraftingCalculator();
        cc.init();
    }
}
