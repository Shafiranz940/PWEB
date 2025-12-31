
const regions = {
  "Asia": {
    "Asia Timur": ["China", "Jepang", "Korea Selatan", "Korea Utara", "Mongolia", "Taiwan", "Hong Kong", "Macau", "Timor Leste", "Brunei"],
    "Asia Tenggara": ["Indonesia", "Malaysia", "Thailand", "Vietnam", "Filipina", "Singapura", "Laos", "Myanmar", "Kamboja", "Brunei"],
    "Asia Selatan": ["India", "Pakistan", "Bangladesh", "Sri Lanka", "Nepal", "Bhutan", "Maladewa", "Afganistan"],
    "Asia Barat": ["Arab Saudi", "UAE", "Qatar", "Kuwait", "Oman", "Yaman", "Yordania", "Suriah", "Lebanon", "Irak", "Israel", "Palestina", "Turki", "Georgia", "Armenia"],
    "Asia Tengah": ["Kazakhstan", "Uzbekistan", "Turkmenistan", "Kirgizstan", "Tajikistan"]
  },
  "Afrika": {
    "Afrika Utara": ["Mesir", "Maroko", "Aljazair", "Tunisia", "Libya", "Sudan", "Mauritania", "Sahara Barat"],
    "Afrika Barat": ["Nigeria", "Ghana", "Pantai Gading", "Senegal", "Mali", "Burkina Faso", "Niger", "Benin", "Togo", "Liberia", "Sierra Leone", "Guinea", "Guinea-Bisau", "Gambia", "Mauritania", "Burkina Faso", "Togo", "Gabon", "Equatorial Guinea", "São Tomé and Príncipe"],
    "Afrika Tengah": ["Kamerun", "Republik Afrika Tengah", "Chad", "Republik Kongo", "Republik Demokratik Kongo", "Gabon", "Guinea Khatulistiwa", "Sao Tome dan Principe"],
    "Afrika Timur": ["Ethiopia", "Kenya", "Tanzania", "Uganda", "Rwanda", "Burundi", "Somalia", "Eritrea", "Djibouti", "Seychelles", "Komoro", "Madagaskar", "Mauritius", "Mozambik", "Malawi", "Zambia", "Zimbabwe"],
    "Afrika Selatan": ["Afrika Selatan", "Lesotho", "Eswatini"]
  },
  "Amerika": {
    "Amerika Utara": ["Amerika Serikat", "Kanada", "Meksiko"],
    "Amerika Tengah": ["Guatemala", "Belize", "Honduras", "El Salvador", "Nikaragua", "Kosta Rika", "Panama"],
    "Karibia": ["Bahama", "Kuba", "Jamaika", "Haiti", "Republik Dominika", "Barbados", "Saint Lucia", "Saint Vincent dan Grenadines", "Grenada", "Antigua dan Barbuda", "Saint Kitts dan Nevis", "Dominika", "Saint Pierre dan Miquelon", "Guadeloupe", "Martinique", "Saint Barthélemy", "Saint Martin", "Montserrat", "Anguila", "Turks dan Caicos", "Bermuda", "Kepulauan Cayman", "Kepulauan Virgin Britania Raya", "Kepulauan Virgin AS", "Kepulauan Leeward", "Kepulauan Windward"],
    "Amerika Selatan": ["Brasil", "Argentina", "Kolombia", "Peru", "Venezuela", "Ekuador", "Bolivia", "Paraguay", "Chile", "Guayana", "Suriname", "Guyana Prancis"]
  },
  "Eropa": {
    "Eropa Utara": ["Denmark", "Estonia", "Finlandia", "Islandia", "Irlandia", "Latvia", "Lithuania", "Norwegia", "Swedia", "Britania Raya"],
    "Eropa Barat": ["Austria", "Belgia", "Perancis", "Jerman", "Liechtenstein", "Luxembourg", "Monako", "Belanda", "Swiss"],
    "Eropa Selatan": ["Albania", "Andorra", "Bosnia dan Herzegovina", "Kroasia", "Siprus", "Greece", "Italia", "Malta", "Montenegro", "Portugal", "San Marino", "Serbia", "Makedonia Utara", "Spanyol", "Vatican City"],
    "Eropa Timur": ["Belarus", "Bulgaria", "Ceko", "Hungaria", "Moldova", "Polandia", "Rumania", "Rusia", "Slowakia", "Ukraina"]
  },
  "Oseania": {
    "Australia dan Selandia Baru": ["Australia", "Selandia Baru"],
    "Melanesia": ["Fiji", "Papua Nugini", "Kaledonia Baru", "Solomon Islands", "Vanuatu"],
    "Micronesia": ["Kiribati", "Marshall Islands", "Micronesia", "Nauru", "Palau"],
    "Polinesia": ["Samoa", "Tonga", "Tuvalu", "Wallis and Futuna", "French Polynesia", "Niue"]
  }
};

const continentSelect = document.getElementById("continentSelect");
const regionSelect = document.getElementById("regionSelect");
const countrySelect = document.getElementById("countrySelect");

Object.keys(regions).forEach(continent => {
  const opt = document.createElement("option");
  opt.value = continent;
  opt.textContent = continent;
  continentSelect.appendChild(opt);
});

continentSelect.addEventListener("change", (e) => {
  const continent = e.target.value;
  regionSelect.innerHTML = '<option value="">-- Pilih Subregion --</option>';
  countrySelect.innerHTML = '<option value="">-- Pilih Negara --</option>';
  countrySelect.disabled = true;

  if(!continent) {
    regionSelect.disabled = true;
    return;
  }

  Object.keys(regions[continent]).forEach(region => {
    const opt = document.createElement("option");
    opt.value = region;
    opt.textContent = region;
    regionSelect.appendChild(opt);
  });

  regionSelect.disabled = false;
});

regionSelect.addEventListener("change", (e) => {
  const continent = continentSelect.value;
  const region = e.target.value;
  countrySelect.innerHTML = '<option value="">-- Pilih Negara --</option>';

  if(!region) {
    countrySelect.disabled = true;
    return;
  }

  regions[continent][region].forEach(country => {
    const opt = document.createElement("option");
    opt.value = country;
    opt.textContent = country;
    countrySelect.appendChild(opt);
  });

  countrySelect.disabled = false;
});

