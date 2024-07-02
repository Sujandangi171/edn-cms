const provinceId = $ ('#province_id').data ('provinceid');
const districtIds = $ ('#district_id').data ('districtids');
const municipalityIds = $ ('#municipality_id').data ('municipalityids');
const wards = $ ('#ward').data ('wards');
// let clusters = null;

const getDistrictByProvince = function (provinceId, districtIds) {
  let url = window.location.origin + '/getDistrictByProvince';
  $.ajax ({
    url: url,
    data: {
      province_id: provinceId,
    },
    method: 'GET',
    dataType: 'text',
    success: function (response) {
      let districts = JSON.parse (response);
      let data = "<option value=''>--Select District--</option>";
      $.each (districts, function (index, value) {
        if ($.isArray (districtIds)) {
          if (districtIds && districtIds.includes (value.code)) {
            data += `<option value=${value.code} selected>${value.name}</option>`;
          } else {
            data += `<option value=${value.code} >${value.name}</option>`;
          }
        } else {
          if (districtIds && districtIds == value.code) {
            data += `<option value=${value.code} selected>${value.name}</option>`;
          } else {
            data += `<option value=${value.code} >${value.name}</option>`;
          }
        }
        $ ('#district_id').html (data);
      });
      getMunicipalityByDistrict (districtIds, municipalityIds);
    },
  });
};

const getMunicipalityByDistrict = function (districtId, municipalityIds) {
  let url = window.location.origin + '/getMunicipalityByDistrict';
  $.ajax ({
    url: url,
    data: {
      district_id: districtId,
    },
    method: 'GET',
    dataType: 'text',
    success: function (response) {
      let municipalities = JSON.parse (response);
      let data = "<option value=''>--Select Municipality--</option>";
      $.each (municipalities, function (index, value) {
        if ($.isArray (municipalityIds)) {
          if (municipalityIds && municipalityIds.includes (value.code)) {
            data += `<option value=${value.code} selected>${value.name}</option>`;
          } else {
            data += `<option value=${value.code}>${value.name}</option>`;
          }
        } else {
          if (municipalityIds && municipalityIds == value.code) {
            data += `<option value=${value.code} selected>${value.name}</option>`;
          } else {
            data += `<option value=${value.code}>${value.name}</option>`;
          }
        }
        $ ('#municipality_id').html (data);
      });
      getWardByMunicipality (municipalityIds, wards);
    },
  });
};

const getWardByMunicipality = function (municipalityIds, wards) {
  let url = window.location.origin + '/getWardByMunicipality';
  $.ajax ({
    url: url,
    data: {
      municipality_id: municipalityIds,
    },
    method: 'GET',
    dataType: 'text',
    success: function (response) {
      let wardData = JSON.parse (response);
      let data;
      $.each (wardData, function (index, value) {
        if ($.isArray (wards)) {
          if (wards && wards.includes (value.name)) {
            data += `<option value=${value.name} selected>${value.name}</option>`;
          } else {
            data += `<option value=${value.name} >${value.name}</option>`;
          }
        } else {
          if (wards && wards == value.name) {
            data += `<option value=${value.name} selected>${value.name}</option>`;
          } else {
            data += `<option value=${value.name}>${value.name}</option>`;
          }
        }
        $ ('#ward').html (data);
      });
      if (typeof clusters !== 'undefined') {
        console.log ('test');
        getClusterByMunicipality ();
      }
    },
  });
};

const getClusterByMunicipality = function () {
  let provinceId = $ ('#province_id').val ();
  let districtId = $ ('#district_id').val ();
  let municipalityId = $ ('#municipality_id').val ();
  $.ajax ({
    url: window.location.origin + '/getClusters',
    data: {
      province_id: provinceId,
      district_id: districtId,
      municipality_id: municipalityId,
    },
    method: 'GET',
    dataType: 'text',
    success: function (response) {
      let clusterData = JSON.parse (response);
      $ ('#cluster_id').empty ();
      let data;
      $.each (clusterData, function (index, value) {
        if (clusters && clusters.includes (value.id)) {
          data += `<option value=${value.id} selected>${value.title}</option>`;
        } else {
          data += `<option value=${value.id} >${value.title}</option>`;
        }
      });
      $ ('#cluster_id').html (data);
    },
  });
};

$ (document).ready (function () {
  getDistrictByProvince (provinceId, districtIds);
  getMunicipalityByDistrict (districtIds);
  getClusterByMunicipality ();
});

//Districts
$ (document).on ('change', '#province_id', function () {
  getDistrictByProvince ($ (this).val ());
});

//Districts
$ (document).on ('change', '#district_id', function () {
  getMunicipalityByDistrict ($ (this).val ());
});

$ (document).on ('change', '#municipality_id', function () {
  getWardByMunicipality ($ (this).val ());
});
