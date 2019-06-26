// pages/major_watch_son/major_watch_son.js
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
    code:'',
    major: [
    ]
  },

  

  major_watch: function (e) {
    var index = e.currentTarget.dataset.key;
    wx.navigateTo({
      url: '../major_inc/major_inc?major_id=' + this.data.major[index].id + '&major_code=' + this.data.major[index].code ,
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
      url: app.globalData.url +'/Major_watch_3rdson.php',
      data: {
        spp_proid: that.data.code
      },
      header:
      {
        'content-type': 'application/json'
      },
      method: 'GET',
      success: function (res) {
        console.log(res.data)
        var major_list = res.data;
        var length = major_list.length;
        var major_fake = new Array();
        for (var i = 0; i < length; i++) {
          var myArray = {
            code: major_list[i]['prop_numbe'], name: major_list[i]['prop_propname'], id: major_list[i]['prop_propid']
          };
          major_fake.push(myArray)
        }
        console.log(length)
        that.setData({
          major: major_fake
        })
        wx.hideLoading()
      }
    })
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    let that = this;
    if (options.major_id) {
      that.setData({
        code: options.major_id
      })
      that.search();
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