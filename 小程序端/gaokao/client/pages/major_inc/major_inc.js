// pages/gaolao/zhuanye.js
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
    id: '',
    name: "",
    code: "",
    info: "",
    schools: [
    ]
  },

  jump_school: function (e) {
    var id = e.currentTarget.dataset.id;
    wx.navigateTo({
      url: '../college/college?sch_id=' + id + '',
    })
  },

  //向后台请求数据
  major_get: function (e) {
    var that = this
    wx.showLoading({
      title: '数据加载中',
      mask: true
    })
    wx.request({
      url: app.globalData.url +'/Major_inc.php',
      data: {
        prop_propid: that.data.id
      },
      header: {
        'content-type': 'application/json'
      },
      method: 'GET',
      success: function (res) {
        var school_list = res.data['school'];
        var length = school_list.length;
        var school_fake = new Array();
        for (var i = 0; i < length; i++) {
          var name_after = school_list[i]['sch_address'].split("省");
          console.log(name_after[0])
          var myArray = {
            province: name_after[0], name: school_list[i]['sch_name'], id: school_list[i]['sch_id']
          };
          school_fake.push(myArray)
        }
        that.setData({
          name: res.data['prop_propname'],
          info: res.data['prop_details'],
          schools: school_fake
        })
        wx.hideLoading()
      },
      fail: function (error) {
      }
    })
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    let that = this;
    if (options.major_code) {
      that.setData({
        code: options.major_code
      })
    }
    if (options.major_id) {
      that.setData({
        id: options.major_id
      })
      that.major_get()
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