// pages/major_search/major_search.js
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
    major_name: '',
    source: '',
    targe_majort: '',
    major: [
    ]
  },

  major_name_set: function (e) {
    let that = this;
    that.setData({
      major_name: e.detail.value
    })
  },

  //向后台请求数据
  search: function (e) {
    wx.showLoading({
      title: '数据加载中',
      mask: true
    })
    let that = this;
    wx.request({
      url: app.globalData.url +'/Major_search.php',
      data: {
        keyword: that.data.major_name,
        whatnum:2
      },
      header:
      {
        'content-type': 'application/json'
      },
      method: 'GET',
      success: function (res) {
        var major_list = res.data;
        console.log(1)
        var length = major_list.length;
        var major_fake = new Array();
        for (var i = 0; i < length; i++) {
          var myArray = {
            color: -1, shock: false, code: major_list[i]['prop_propid'], name: major_list[i]['prop_propname']
          };
          major_fake.push(myArray)
        }
        that.setData({
          major: major_fake
        })
        that.rand_color()
        wx.hideLoading()
      }
    })
  },

  rand_color: function (e) {
    let that = this;
    var length = that.data.major.length;
    for (var i = 0; i < length; i++) {
      var color = "major[" + i + "].color";
      var random = Math.floor(Math.random() * 3) + 1;
      that.setData({
        [color]: random
      })
    }
  },

  list_shock: function (e) {
    let that = this;
    var index = e.currentTarget.dataset.key;
    var shock = "major[" + index + "].shock";
    var major_name = that.data.major[index].name;
    that.setData({
      [shock]: true,
      targe_majort: major_name
    })
    setTimeout(function () {
      let pages = getCurrentPages();
      let prevPage = pages[pages.length - 2];
      prevPage.setData({
        form_volunteer: that.data.targe_majort
      })
      wx.navigateBack({
        delta: 1
      })
    }, 200);
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    console.log(1)
    let that = this;
    if (options.source) {
      that.setData({
        source: options.source
      })
    }
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})