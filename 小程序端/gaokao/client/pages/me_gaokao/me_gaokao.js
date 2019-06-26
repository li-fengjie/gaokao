// pages/me_gaokao/me_gaokao.js
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
    little1: false, little2: false, little3: false, little4: false, little5: false, little6: false,
    Bubble: [
      { move: false, grade: -1 }, { move: false, grade: -1 }, { move: false, grade: -1 },
    ],
    grade_input: false,
    curtain_black_top: false,
    now_input: -1,
    form_grade_fake: -1,
    curtain_ani: false,
    curtain_university_top: false,
    userInfo: {},
    hasUserInfo: false,
    mywish: -1,
    tel: -1,
    tel_fake: '',
    mywish_fake: '',
    wish_up:false,//志愿大学上传
    userid:''
  },

  onLaunch: function () {
    wx.login({
      success: function (res) {
        if (res.code) {
          //发起网络请求  
          console.log(res.code)
        } else {
          console.log('获取用户登录态失败！' + res.errMsg)
        }
      }
    });
  },

  check_user: function (e) {
    var that = this;
    wx.openSetting({
      success: (res) => {
        wx.getUserInfo({
          success: res => {
            console.log(res.userInfo);
            // 可以将 res 发送给后台解码出 unionId
            this.globalData.userInfo = res.userInfo
            // 由于 getUserInfo 是网络请求，可能会在 Page.onLoad 之后才返回
            // 所以此处加入 callback 以防止这种情况
            if (this.userInfoReadyCallback) {
              this.userInfoReadyCallback(res)
            }
          }
        })
        that.user_set();
      },
      fail: (res) => {
        console.log(-1);
      }
    })
  },

  getUserInfo: function (e) {
    app.globalData.userInfo = e.detail.userInfo
    this.setData({
      userInfo: e.detail.userInfo,
      hasUserInfo: true
    })
  },


  user_set: function (e) {
    if (app.globalData.userInfo) {
      this.setData({
        userInfo: app.globalData.userInfo,
        hasUserInfo: true
      })
    } else if (this.data.canIUse) {
      // 由于 getUserInfo 是网络请求，可能会在 Page.onLoad 之后才返回
      // 所以此处加入 callback 以防止这种情况
      app.userInfoReadyCallback = res => {
        this.setData({
          userInfo: res.userInfo,
          hasUserInfo: true
        })
      }
    } else {
      // 在没有 open-type=getUserInfo 版本的兼容处理
      wx.getUserInfo({
        success: res => {
          app.globalData.userInfo = res.userInfo
          this.setData({
            userInfo: res.userInfo,
            hasUserInfo: true
          })
        }
      })
    }
  },

  //上传电话号码
  tel_up: function (e) {
    let that = this
    wx.showModal({
      title: '提示',
      content: '是否更改手机号码',
      success: function (res) {
        if (res.confirm) {
          var tel_fake = that.data.tel_fake
          that.setData({
            tel: tel_fake
          })
          that.up_data()//上传电话号码
        } else if (res.cancel) {
          var tel = that.data.tel
          that.setData({
            tel: tel
          })
        }
      }
    })
  },

  //分数设置
  grade_set: function (e) {
    this.setData({
      form_grade_fake: e.detail.value,
    })
  },

  wish_set: function (e) {
    this.setData({
      mywish_fake: e.detail.value,
    })
  },

  tel_set: function (e) {
    this.setData({
      tel_fake: e.detail.value,
    })
  },

  input_word: function () {
    this.setData({
      grade_input_word: true,
    })
  },

  grade_input_open: function (e) {
    var index = e.currentTarget.dataset.key;
    let that = this;
    that.setData({
      grade_input: true,
      curtain_black_top: true,
      now_input: index,
      curtain_ani: true
    })
  },

  university_input_open: function (e) {
    let that = this;
    that.setData({
      grade_input: true,
      curtain_black_top: true,
      curtain_ani: true,
      curtain_university_top: true
    })
  },

  grade_input_close: function (e) {
    let that = this;
    var index = e.currentTarget.dataset.key;
    this.setData({
      grade_input: false,
      grade_input_word: false,
      curtain_ani: false
    })

    setTimeout(function () {
      that.setData({
        curtain_black_top: false,
        curtain_university_top: false
      });
      if (index == "check") {
        var form_grade_fake = that.data.form_grade_fake;
        var form_grade = "Bubble[" + that.data.now_input + "].grade"
        that.setData({
          [form_grade]: form_grade_fake
        })
        that.up_data()//上传分数
      }
      else if (index == "university_close") {
        var search = e.currentTarget.dataset.search;
        if (search == "true")
          wx.navigateTo({
            url: '../college_search/college_search?college_name=' + that.data.mywish_fake + '&source=me',
          })
      }
    }, 300);//解除禁止操作
  },

  little_rise: function (e) {
    var that = this;
    that.setData({
      little1: true,
      little6: true
    })
    setTimeout(function () {
      that.setData({
        little2: true,
        little5: true
      })
    }, 1000)

    setTimeout(function () {
      that.setData({
        little3: true,
        little4: true
      })
    }, 1500)
  },

  little_again: function (e) {
    var that = this;
    that.setData({
      little1: false,
      little2: false,
      little3: false,
      little4: false,
      little5: false,
      little6: false,
    })
    setTimeout(function () {
      that.little_rise()
    }, 2000)
  },

  Bubble_again: function (e) {
    let that = this;
    var index = e.currentTarget.dataset.key;
    var Bubble = "Bubble[" + index + "].move";

    that.setData({
      [Bubble]: false
    })

    setTimeout(function () {
      that.setData({
        [Bubble]: true
      })
    }, 200)
  },


  Bubble_move: function (e) {
    let that = this;
    var Bubble1 = "Bubble[" + 0 + "].move";
    var Bubble2 = "Bubble[" + 1 + "].move";
    var Bubble3 = "Bubble[" + 2 + "].move";

    that.setData({
      [Bubble1]: true
    })
    setTimeout(function () {
      that.setData({
        [Bubble2]: true
      })
    }, 1000)

    setTimeout(function () {
      that.setData({
        [Bubble3]: true
      })
    }, 1500)
  },

  //上传信息
  up_data: function (e) {
    wx.showLoading({
      title: '数据加载中',
      mask: true
    })
    let that = this;
    wx.request({
      url: app.globalData.url +'/Me_gaokao.php',
      data: {
        my_userid: app.globalData.userid,
        mk_onegrade: that.data.Bubble[0].grade,
        mk_twograde: that.data.Bubble[1].grade,
        mk_thrgrade: that.data.Bubble[2].grade,
        mz_oneschool: that.data.mywish,
        mz_twoschool:-1,
        mz_thrschool:-1,
        my_mobilePhoneNumber: that.data.tel,
      },
      header:
      {
        'content-type': 'application/json'
      },
      method: 'GET',
      success: function (res) {
        console.log(res.data)
        wx.hideLoading()
      }
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
      url: app.globalData.url+'/Me_gaokao2.php',
      data: {
        my_userid: app.globalData.userid
      },
      header:
      {
        'content-type': 'application/json'
      },
      method: 'GET',
      success: function (res) {
        var Bubble_list = res.data;
        var onegrade = "Bubble[0].grade"
        var twograde = "Bubble[1].grade"
        var thrgrade = "Bubble[2].grade"
        if(res.data!=-1)
        that.setData({
          [onegrade]: Bubble_list['mk_onegrade'],
          [twograde]: Bubble_list['mk_twograde'],
          [thrgrade]: Bubble_list['mk_thrgrade'],
          mywish: Bubble_list['mz_oneschool'],
          tel: Bubble_list['my_mobilePhoneNumber'],
        })
        else
          that.setData({
            [onegrade]:-1,
            [twograde]: -1,
            [thrgrade]: -1,
            mywish: -1,
            tel: -1,
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
    that.setData({
      userid: app.globalData.userid
    })
    that.little_rise();
    that.Bubble_move();
    that.user_set();
    that.onLaunch();
    that.search();
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
    let that = this
    if (that.data.mywish != -1 && that.data.wish_up==true) {
      that.up_data()//上传志愿
      that.setData({
        wish_up:false
      })
    }
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