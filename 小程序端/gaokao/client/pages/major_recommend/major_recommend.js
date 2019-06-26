// pages/major_recommend/major_recommend.js
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
    px: 0,//1rpx=?px
    height: 0,
    now_num:0,
    next_num:1,
    form_volunteer:'',
    form_grade:-1,
    form_location:'',
    form_target:'',
    school_num:0,
    school: [    
      ]
  },

  //学校跳转
  jump_school:function(e){
    let that=this;
    var index = e.currentTarget.dataset.key;
    wx.navigateTo({
      url: '../college/college?sch_id=' + that.data.school[index].code,
    })
  },

  //向后台请求数据
  search: function (e) {
    let that = this;
    wx.request({
      url: app.globalData.url +'/Major_recommend.php',
      data: {
        ev_majorselect: that.data.form_volunteer,
        ev_userregion: that.data.form_location,
        ev_usergrade: that.data.form_grade,
        ev_localselect: that.data.form_target,
      },
      header:
      {
        'content-type': 'application/json'
      },
      method: 'GET',
      success: function (res) {
        console.log(res.data)
        var school_list = res.data;
        var length = school_list.length;
        var school_fake = new Array();
        for (var i = 0; i < length; i++) {
          var myArray = {
            spread: false, 
            code: school_list[i]['res_schid'], 
            name: school_list[i]['res_schname'], 
            level: school_list[i]['res_schbacth'], 
            province: school_list[i]['res_schpro'], 
            back: school_list[i]['res_schbeijing'].replace("\r\n", ""),
          };
          school_fake.push(myArray)
        }
        that.setData({
          school: school_fake,
          school_num: length
        })
        wx.hideLoading()
      }
    })
  },

  text2:function(e){
    console.log(e.detail.scrollTop)
  },

  circle_start:function(e){
    var that=this;
    var px=that.data.px;
    var top = e.detail.scrollTop;
    var long = 170 * px + px * 584 * that.data.next_num-20/px;
    var short = 170 * px + px * 584 * (that.data.now_num-1) - 20;
    if (top > long){
      var now=that.data.now_num+1;
      var next = that.data.next_num+1;
      var now_spread = "school[" + now-1 +"].spread";
      var next_spread = "school[" + next-1 + "].spread";
      that.setData({
        now_num: now,
        next_num: next,
        now_spread:false,
        next_spread:true,
      })
    }
    else if(top<short){
      var now = that.data.now_num -1;
      var next = that.data.next_num -1;
      var now_spread = "school[" + now +1 + "].spread";
      var next_spread = "school[" + next +1 + "].spread";
      that.setData({
        now_num: now,
        next_num: next,
        now_spread: true,
        next_spread: false,
      })
    }
  },

  i_flashes: function (e) {
    let that = this;
    var index = e.currentTarget.dataset.key;
    var spread = "school[" + index + "].spread";
    var spread_bool = that.data.school[index].spread;
    that.setData({
      [spread]: !spread_bool
    })
  },

  getrpx: function (e) {
    var that = this;
    var height_fake = wx.getSystemInfoSync().windowHeight;
    var width = wx.getSystemInfoSync().windowWidth;
    var px_fake = width / 750;
    that.setData({
      px: px_fake,
      height: height_fake
    })
  },


  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    wx.showLoading({
      title: '数据加载中',
      mask: true
    })
    var that=this;
    that.getrpx();
    if (options.form_volunteer) {
      that.setData({
        form_volunteer: options.form_volunteer
      })
    }
    if (options.form_grade) {
      that.setData({
        form_grade: options.form_grade
      })
    }
    if (options.form_location) {
      that.setData({
        form_location: options.form_location
      })
    }
    if (options.form_target) {
      that.setData({
        form_target: options.form_target
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