//app.js
App({
  onLaunch: function () {
    // 展示本地存储能力
    var logs = wx.getStorageSync('logs') || []
    logs.unshift(Date.now())
    wx.setStorageSync('logs', logs)

    // 登录
    wx.login({
      success: res => {
        // 发送 res.code 到后台换取 openId, sessionKey, unionId
        var code = res.code;
        if (code) {
          console.log('获取用户登录凭证：' + code);

          // --------- 发送凭证 ------------------
          wx.request({
            url: this.globalData.url+'/login.php',
            data: {
              grant_type: 'authorization_code',
              appid: 'wxd5fc991080307669',
              secret: '141b4973302bcfba3d35106b024b0948',
              code: code
            },
            header:
            {
              'content-type': 'application/json'
            },
            method: 'GET',
              success: res => {
                var openid = res.data['my_authData']
                var userid = res.data['my_userid']
                console.log(userid)
                this.globalData.openid = openid
                this.globalData.userid = userid
                console.log(this.globalData.userid)
              }
            
          })
          // ------------------------------------

        } else {
        }
      }
    })
    // 获取用户信息
    wx.getSetting({
      success: res => {
        if (res.authSetting['scope.userInfo']) {
          // 已经授权，可以直接调用 getUserInfo 获取头像昵称，不会弹框
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
        }
      }
    })
  },
  globalData: {
    userInfo: null,
    openid2: '',
    userid: '',
    url:"https://4yrgqn3s.qcloud.la/api"
  }
})