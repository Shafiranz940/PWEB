
const StudentDatabase = [
    "Alif Ramadhan Pratama",
    "Bella Anggraini",
    "Cahya Putra Wijaya",
    "Dinda Maharani",
    "Erlangga Santoso",
    "Fajar Nurdiansyah",
    "Gita Amalia Putri",
    "Hendra Gunawan",
    "Intan Permatasari",
    "Jefri Kurniawan",
    "Karina Febriyanti",
    "Leonardo Wijaya",
    "Maya Sari Dewi",
    "Naufal Pratama",
    "Olivia Kusuma",
    "Prasetyo Adi Nugroho",
    "Qurratul Aini",
    "Rafif Hakim",
    "Selvi Anggraini",
    "Tri Wahyudi"
];

class AutoComplete {
    constructor(input, suggestions, data) {
        this.input = input;
        this.suggestions = suggestions;
        this.data = data;
        this.selectedIndex = -1;
        this.init();
    }

    init() {
        this.input.addEventListener('input', this.handleInput.bind(this));
        this.input.addEventListener('keydown', this.handleKeydown.bind(this));
        document.addEventListener('click', this.handleDocumentClick.bind(this));
    }

    handleInput(e) {
        const value = e.target.value.trim().toLowerCase();
        
        if (value.length < 2) {
            this.hideSuggestions();
            return;
        }

        const filteredData = this.data.filter(item => 
            item.toLowerCase().includes(value)
        ).slice(0, 6); // Batasi hingga 6 saran

        if (filteredData.length > 0) {
            this.showSuggestions(filteredData, value);
        } else {
            this.hideSuggestions();
        }
    }

    showSuggestions(data, query) {
        this.suggestions.innerHTML = '';
        
        data.forEach((item, index) => {
            const div = document.createElement('div');
            div.className = 'autocomplete-suggestion';
            
            // Highlight matching text
            const regex = new RegExp(`(${query})`, 'gi');
            const highlightedText = item.replace(regex, '<span class="highlight">$1</span>');
            div.innerHTML = highlightedText;
            
            div.addEventListener('click', () => {
                this.selectSuggestion(item);
            });
            
            this.suggestions.appendChild(div);
        });
        
        this.suggestions.style.display = 'block';
        this.selectedIndex = -1;
    }

    hideSuggestions() {
        this.suggestions.style.display = 'none';
        this.selectedIndex = -1;
    }

    selectSuggestion(value) {
        this.input.value = value;
        this.hideSuggestions();
        this.input.focus();
    }

    handleKeydown(e) {
        const suggestionElements = this.suggestions.querySelectorAll('.autocomplete-suggestion');
        
        if (suggestionElements.length === 0) return;

        switch (e.key) {
            case 'ArrowDown':
                e.preventDefault();
                this.selectedIndex = Math.min(this.selectedIndex + 1, suggestionElements.length - 1);
                this.updateSelection(suggestionElements);
                break;
            
            case 'ArrowUp':
                e.preventDefault();
                this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
                this.updateSelection(suggestionElements);
                break;
            
            case 'Enter':
                e.preventDefault();
                if (this.selectedIndex >= 0) {
                    this.selectSuggestion(suggestionElements[this.selectedIndex].textContent);
                }
                break;
            
            case 'Escape':
                this.hideSuggestions();
                break;
        }
    }

    updateSelection(elements) {
        elements.forEach((el, index) => {
            if (index === this.selectedIndex) {
                el.classList.add('selected');
                el.scrollIntoView({ block: 'nearest' });
            } else {
                el.classList.remove('selected');
            }
        });
    }

    handleDocumentClick(e) {
        if (!this.input.contains(e.target) && !this.suggestions.contains(e.target)) {
            this.hideSuggestions();
        }
    }
}

// autocomplete 
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('studentName');
    const nameSuggestions = document.getElementById('nameSuggestions');
    
    new AutoComplete(nameInput, nameSuggestions, studentDatabase);
    const form = document.getElementById('registrationForm');
    const successMessage = document.getElementById('successMessage');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        // validation form
        const nimValue = document.getElementById('nim').value;
        if (!/^\d{9}$/.test(nimValue)) {
            alert('NIM harus berupa 9 digit angka!');
            return;
        }

        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        
        console.log('Data Registrasi:', data);
        
        successMessage.style.display = 'block';
        successMessage.scrollIntoView({ behavior: 'smooth' });
        
        form.reset();
        
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 5000);
    });

    const nimInput = document.getElementById('nim');
    nimInput.addEventListener('input', function(e) {
        const value = e.target.value;
        if (value && !/^\d+$/.test(value)) {
            e.target.setCustomValidity('NIM hanya boleh berisi angka');
        } else if (value.length > 9) {
            e.target.value = value.slice(0, 9);
        } else {
            e.target.setCustomValidity('');
        }
    });
});