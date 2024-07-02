/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/province.js ***!
  \**********************************/
var provinceId = $('#province_id').data('provinceid');
var districtIds = $('#district_id').data('districtids');
var municipalityIds = $('#municipality_id').data('municipalityids');
var wards = $('#ward').data('wards');
// let clusters = null;

var getDistrictByProvince = function getDistrictByProvince(provinceId, districtIds) {
  var url = window.location.origin + '/getDistrictByProvince';
  $.ajax({
    url: url,
    data: {
      province_id: provinceId
    },
    method: 'GET',
    dataType: 'text',
    success: function success(response) {
      var districts = JSON.parse(response);
      var data = "<option value=''>--Select District--</option>";
      $.each(districts, function (index, value) {
        if ($.isArray(districtIds)) {
          if (districtIds && districtIds.includes(value.code)) {
            data += "<option value=".concat(value.code, " selected>").concat(value.name, "</option>");
          } else {
            data += "<option value=".concat(value.code, " >").concat(value.name, "</option>");
          }
        } else {
          if (districtIds && districtIds == value.code) {
            data += "<option value=".concat(value.code, " selected>").concat(value.name, "</option>");
          } else {
            data += "<option value=".concat(value.code, " >").concat(value.name, "</option>");
          }
        }
        $('#district_id').html(data);
      });
      getMunicipalityByDistrict(districtIds, municipalityIds);
    }
  });
};
var getMunicipalityByDistrict = function getMunicipalityByDistrict(districtId, municipalityIds) {
  var url = window.location.origin + '/getMunicipalityByDistrict';
  $.ajax({
    url: url,
    data: {
      district_id: districtId
    },
    method: 'GET',
    dataType: 'text',
    success: function success(response) {
      var municipalities = JSON.parse(response);
      var data = "<option value=''>--Select Municipality--</option>";
      $.each(municipalities, function (index, value) {
        if ($.isArray(municipalityIds)) {
          if (municipalityIds && municipalityIds.includes(value.code)) {
            data += "<option value=".concat(value.code, " selected>").concat(value.name, "</option>");
          } else {
            data += "<option value=".concat(value.code, ">").concat(value.name, "</option>");
          }
        } else {
          if (municipalityIds && municipalityIds == value.code) {
            data += "<option value=".concat(value.code, " selected>").concat(value.name, "</option>");
          } else {
            data += "<option value=".concat(value.code, ">").concat(value.name, "</option>");
          }
        }
        $('#municipality_id').html(data);
      });
      getWardByMunicipality(municipalityIds, wards);
    }
  });
};
var getWardByMunicipality = function getWardByMunicipality(municipalityIds, wards) {
  var url = window.location.origin + '/getWardByMunicipality';
  $.ajax({
    url: url,
    data: {
      municipality_id: municipalityIds
    },
    method: 'GET',
    dataType: 'text',
    success: function success(response) {
      var wardData = JSON.parse(response);
      var data;
      $.each(wardData, function (index, value) {
        if ($.isArray(wards)) {
          if (wards && wards.includes(value.name)) {
            data += "<option value=".concat(value.name, " selected>").concat(value.name, "</option>");
          } else {
            data += "<option value=".concat(value.name, " >").concat(value.name, "</option>");
          }
        } else {
          if (wards && wards == value.name) {
            data += "<option value=".concat(value.name, " selected>").concat(value.name, "</option>");
          } else {
            data += "<option value=".concat(value.name, ">").concat(value.name, "</option>");
          }
        }
        $('#ward').html(data);
      });
      if (typeof clusters !== 'undefined') {
        console.log('test');
        getClusterByMunicipality();
      }
    }
  });
};
var getClusterByMunicipality = function getClusterByMunicipality() {
  var provinceId = $('#province_id').val();
  var districtId = $('#district_id').val();
  var municipalityId = $('#municipality_id').val();
  $.ajax({
    url: window.location.origin + '/getClusters',
    data: {
      province_id: provinceId,
      district_id: districtId,
      municipality_id: municipalityId
    },
    method: 'GET',
    dataType: 'text',
    success: function success(response) {
      var clusterData = JSON.parse(response);
      $('#cluster_id').empty();
      var data;
      $.each(clusterData, function (index, value) {
        if (clusters && clusters.includes(value.id)) {
          data += "<option value=".concat(value.id, " selected>").concat(value.title, "</option>");
        } else {
          data += "<option value=".concat(value.id, " >").concat(value.title, "</option>");
        }
      });
      $('#cluster_id').html(data);
    }
  });
};
$(document).ready(function () {
  getDistrictByProvince(provinceId, districtIds);
  getMunicipalityByDistrict(districtIds);
  getClusterByMunicipality();
});

//Districts
$(document).on('change', '#province_id', function () {
  getDistrictByProvince($(this).val());
});

//Districts
$(document).on('change', '#district_id', function () {
  getMunicipalityByDistrict($(this).val());
});
$(document).on('change', '#municipality_id', function () {
  getWardByMunicipality($(this).val());
});
/******/ })()
;