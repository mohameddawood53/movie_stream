! function (e, t) {
	"object" == typeof exports && "object" == typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define("Amplitude", [], t) : "object" == typeof exports ? exports.Amplitude = t() : e.Amplitude = t()
}(this, function () {
	return function (e) {
		var t = {};

		function a(l) {
			if (t[l]) return t[l].exports;
			var i = t[l] = {
				i: l,
				l: !1,
				exports: {}
			};
			return e[l].call(i.exports, i, i.exports, a), i.l = !0, i.exports
		}
		return a.m = e, a.c = t, a.i = function (e) {
			return e
		}, a.d = function (e, t, l) {
			a.o(e, t) || Object.defineProperty(e, t, {
				configurable: !1,
				enumerable: !0,
				get: l
			})
		}, a.n = function (e) {
			var t = e && e.__esModule ? function () {
				return e.default
			} : function () {
				return e
			};
			return a.d(t, "a", t), t
		}, a.o = function (e, t) {
			return Object.prototype.hasOwnProperty.call(e, t)
		}, a.p = "", a(a.s = 8)
	}([function (e, t, a) {
		"use strict";
		var l = {
			active_song: new Audio,
			active_metadata: {},
			active_album: "",
			active_index: 0,
			active_playlist: "",
			autoplay: !1,
			playback_speed: 1,
			callbacks: {},
			songs: {},
			playlists: {},
			shuffled_playlists: {},
			shuffled_statuses: {},
			shuffled_active_indexes: {},
			repeat: !1,
			shuffle_list: {},
			shuffle_on: !1,
			shuffle_active_index: 0,
			default_album_art: "",
			debug: !1,
			volume: .5,
			pre_mute_volume: .5,
			volume_increment: 5,
			volume_decrement: 5,
			soundcloud_client: "",
			soundcloud_use_art: !1,
			soundcloud_song_count: 0,
			soundcloud_songs_ready: 0,
			is_touch_moving: !1
		};
		e.exports = l
	}, function (e, t, a) {
		"use strict";
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var l = u(a(3)),
			i = u(a(2));

		function u(e) {
			return e && e.__esModule ? e : {
				default: e
			}
		}
		var n = a(0),
			s = function () {
				function e(e) {
					n.debug && console.log(e)
				}

				function t(t) {
					if (n.callbacks[t]) {
						var a = window[n.callbacks[t]];
						e("Running Callback: " + t);
						try {
							a()
						} catch (t) {
							if ("CANCEL EVENT" == t.message) throw t;
							e("Callback error: " + t.message)
						}
					}
				}

				function a(e) {
					return n.active_album != e
				}

				function u(e, t, a) {
					var l = e[t];
					e[t] = e[a], e[a] = l
				}
				return {
					resetConfig: function () {
						n.active_song = new Audio, n.active_metadata = {}, n.active_album = "", n.active_index = 0, n.active_playlist = "", n.autoplay = !1, n.playback_speed = 1, n.callbacks = {}, n.songs = {}, n.playlists = {}, n.shuffled_playlists = {}, n.shuffled_statuses = {}, n.repeat = !1, n.shuffle_list = {}, n.shuffle_on = !1, n.shuffle_active_index = 0, n.default_album_art = "", n.debug = !1, n.handle_song_elements = !0, n.volume = .5, n.pre_mute_volume = .5, n.volume_increment = 5, n.volume_decrement = 5, n.soundcloud_client = "", n.soundcloud_use_art = !1, n.soundcloud_song_count = 0, n.soundcloud_songs_ready = 0
					},
					writeDebugMessage: e,
					runCallback: t,
					changeSong: function (e) {
						var u, s, d = n.songs[e];
						l.default.stop(), i.default.setPlayPauseButtonsToPause(), i.default.resetSongSliders(), i.default.resetSongTimeVisualizations(), i.default.resetTimes(), a(d) && t("album_change"), u = d, s = e, n.active_song.src = u.url, n.active_metadata = u, n.active_album = u.album, n.active_index = s, i.default.displaySongMetadata(), i.default.setActiveContainer(), i.default.syncSongDuration()
					},
					checkNewSong: function (e) {
						return e != n.active_index
					},
					checkNewAlbum: a,
					checkNewPlaylist: function (e) {
						return n.active_playlist != e
					},
					shuffleSongs: function () {
						for (var e = new Array(n.songs.length), t = 0; t < n.songs.length; t++) e[t] = n.songs[t], e[t].original_index = t;
						for (t = n.songs.length - 1; t > 0; t--) u(e, t, Math.floor(Math.random() * n.songs.length + 1) - 1);
						n.shuffle_list = e
					},
					shufflePlaylistSongs: function (e) {
						for (var t = new Array(n.playlists[e].length), a = 0; a < n.playlists[e].length; a++) t[a] = n.songs[n.playlists[e][a]], t[a].original_index = a;
						for (a = n.playlists[e].length - 1; a > 0; a--) u(t, a, Math.floor(Math.random() * n.playlists[e].length + 1) - 1);
						n.shuffled_playlists[e] = t
					},
					setActivePlaylist: function (e) {
						n.active_playlist != e && t("playlist_changed"), n.active_playlist = e
					},
					isURL: function (e) {
						return /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/.test(e)
					},
					isInt: function (e) {
						return !isNaN(e) && parseInt(Number(e)) == e && !isNaN(parseInt(e, 10))
					}
				}
			}();
		t.default = s, e.exports = t.default
	}, function (e, t, a) {
		"use strict";
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var l = u(a(0)),
			i = u(a(10));

		function u(e) {
			return e && e.__esModule ? e : {
				default: e
			}
		}

		function n(e, t, a) {
			return t in e ? Object.defineProperty(e, t, {
				value: a,
				enumerable: !0,
				configurable: !0,
				writable: !0
			}) : e[t] = a, e
		}
		var s = function () {
			var e;

			function t() {
				for (var e = document.getElementsByClassName("amplitude-volume-slider"), t = 0; t < e.length; t++) e[t].value = 100 * l.default.active_song.volume
			}

			function t(e) {}

			function a(e) {
				e = isNaN(e) ? 0 : e;
				for (var t = document.querySelectorAll('.amplitude-song-slider[amplitude-main-song-slider="true"]'), a = 0; a < t.length; a++) t[a].value = e
			}

			function u(e, t) {
				t = isNaN(t) ? 0 : t;
				for (var a = document.querySelectorAll('.amplitude-song-slider[amplitude-playlist-song-slider="true"][amplitude-playlist="' + e + '"]'), l = 0; l < a.length; l++) a[l].value = t
			}

			function s(e, t, a) {
				if (a = isNaN(a) ? 0 : a, "" != e && null != e)
					for (var l = document.querySelectorAll('.amplitude-song-slider[amplitude-playlist="' + e + '"][amplitude-song-index="' + t + '"]'), i = 0; i < l.length; i++) l[i].value = a;
				else
					for (l = document.querySelectorAll('.amplitude-song-slider[amplitude-song-index="' + t + '"]'), i = 0; i < l.length; i++) l[i].hasAttribute("amplitude-playlist") || 0 != a && (l[i].value = a)
			}
			return n(e = {
				syncCurrentTime: function (e, t) {
					i.default.syncCurrentHours(e.hours), i.default.syncCurrentMinutes(e.minutes), i.default.syncCurrentSeconds(e.seconds), i.default.syncCurrentTime(e), a(t), u(l.default.active_playlist, t), s(l.default.active_playlist, l.default.active_index, t), i.default.syncSongTimeVisualizations(t)
				},
				resetTimes: function () {
					i.default.resetCurrentHours(), i.default.resetCurrentMinutes(), i.default.resetCurrentSeconds(), i.default.resetCurrentTime()
				},
				resetSongSliders: function () {
					for (var e = document.getElementsByClassName("amplitude-song-slider"), t = 0; t < e.length; t++) e[t].value = 0
				},
				resetSongTimeVisualizations: function () {
					for (var e = document.getElementsByClassName("amplitude-song-time-visualization"), t = 0; t < e.length; t++) e[t].querySelector(".amplitude-song-time-visualization-status").setAttribute("style", "width: 0px")
				},
				setActiveContainer: function () {
					for (var e = document.getElementsByClassName("amplitude-song-container"), t = 0; t < e.length; t++) e[t].classList.remove("amplitude-active-song-container");
					if ("" == l.default.active_playlist || null == l.default.active_playlist) {
						if (document.querySelectorAll('.amplitude-song-container[amplitude-song-index="' + l.default.active_index + '"]'))
							for (e = document.querySelectorAll('.amplitude-song-container[amplitude-song-index="' + l.default.active_index + '"]'), t = 0; t < e.length; t++) e[t].hasAttribute("amplitude-playlist") || e[t].classList.add("amplitude-active-song-container")
					} else if (document.querySelectorAll('.amplitude-song-container[amplitude-song-index="' + l.default.active_index + '"][amplitude-playlist="' + l.default.active_playlist + '"]'))
						for (e = document.querySelectorAll('.amplitude-song-container[amplitude-song-index="' + l.default.active_index + '"][amplitude-playlist="' + l.default.active_playlist + '"]'), t = 0; t < e.length; t++) e[t].classList.add("amplitude-active-song-container")
				},
				displaySongMetadata: function () {
					for (var e = ["cover_art_url", "station_art_url", "podcast_episode_cover_art_url"], t = document.querySelectorAll("[amplitude-song-info]"), a = 0; a < t.length; a++) {
						var i = t[a].getAttribute("amplitude-song-info"),
							u = t[a].getAttribute("amplitude-playlist"),
							n = t[a].getAttribute("amplitude-main-song-info");
						l.default.active_playlist != u && "true" != n || (void 0 != l.default.active_metadata[i] ? e.indexOf(i) >= 0 ? t[a].setAttribute("src", l.default.active_metadata[i]) : t[a].innerHTML = l.default.active_metadata[i] : e.indexOf(i) >= 0 ? "" != l.default.default_album_art ? t[a].setAttribute("src", l.default.default_album_art) : t[a].setAttribute("src", "") : t[a].innerHTML = "")
					}
				},
				syncPlaybackSpeed: function () {
					for (var e = document.getElementsByClassName("amplitude-playback-speed"), t = 0; t < e.length; t++) switch (e[t].classList.remove("amplitude-playback-speed-10"), e[t].classList.remove("amplitude-playback-speed-15"), e[t].classList.remove("amplitude-playback-speed-20"), l.default.playback_speed) {
						case 1:
							e[t].classList.add("amplitude-playback-speed-10");
							break;
						case 1.5:
							e[t].classList.add("amplitude-playback-speed-15");
							break;
						case 2:
							e[t].classList.add("amplitude-playback-speed-20")
					}
				},
				syncVolumeSliders: t,
				setPlayPauseButtonsToPause: function () {
					for (var e = document.querySelectorAll(".amplitude-play-pause"), t = 0; t < e.length; t++) i.default.setElementPause(e[t])
				},
				setFirstSongInPlaylist: function (e, t) {
					for (var a = ["cover_art_url", "station_art_url", "podcast_episode_cover_art_url"], l = document.querySelectorAll('[amplitude-song-info][amplitude-playlist="' + t + '"]'), i = 0; i < l.length; i++) {
						var u = l[i].getAttribute("amplitude-song-info");
						l[i].getAttribute("amplitude-playlist") == t && (void 0 != e[u] ? a.indexOf(u) >= 0 ? l[i].setAttribute("src", e[u]) : l[i].innerHTML = e[u] : a.indexOf(u) >= 0 ? "" != e.default_album_art ? l[i].setAttribute("src", e.default_album_art) : l[i].setAttribute("src", "") : l[i].innerHTML = "")
					}
				},
				syncMainPlayPause: function (e) {
					"string" != typeof e && (e = l.default.active_song.paused ? "paused" : "playing");
					for (var t = document.querySelectorAll('.amplitude-play-pause[amplitude-main-play-pause="true"]'), a = 0; a < t.length; a++) switch (e) {
						case "playing":
							i.default.setElementPlay(t[a]);
							break;
						case "paused":
							i.default.setElementPause(t[a])
					}
				},
				syncPlaylistPlayPause: function (e, t) {
					"string" != typeof t && (t = l.default.active_song.paused ? "paused" : "playing");
					for (var a = document.querySelectorAll('.amplitude-play-pause[amplitude-playlist-main-play-pause="true"]'), u = 0; u < a.length; u++) a[u].getAttribute("amplitude-playlist") == e && "playing" == t ? i.default.setElementPlay(a[u]) : i.default.setElementPause(a[u])
				},
				syncSongPlayPause: function (e, t, a) {
					if ("string" != typeof a && (a = l.default.active_song.paused ? "paused" : "playing"), null == e || "" == e)
						for (var u = document.querySelectorAll(".amplitude-play-pause[amplitude-song-index]"), n = 0; n < u.length; n++) u[n].hasAttribute("amplitude-playlist") ? i.default.setElementPause(u[n]) : "playing" == a && u[n].getAttribute("amplitude-song-index") == t ? i.default.setElementPlay(u[n]) : i.default.setElementPause(u[n]);
					else
						for (u = document.querySelectorAll(".amplitude-play-pause[amplitude-song-index]"), n = 0; n < u.length; n++) u[n].hasAttribute("amplitude-playlist") && u[n].getAttribute("amplitude-song-index") == t && u[n].getAttribute("amplitude-playlist") == e && "playing" == a ? i.default.setElementPlay(u[n]) : i.default.setElementPause(u[n])
				},
				syncRepeat: function () {
					for (var e = document.getElementsByClassName("amplitude-repeat"), t = 0; t < e.length; t++) l.default.repeat ? (e[t].classList.add("amplitude-repeat-on"), e[t].classList.remove("amplitude-repeat-off")) : (e[t].classList.remove("amplitude-repeat-on"), e[t].classList.add("amplitude-repeat-off"))
				},
				syncMute: function (e) {
					for (var t = document.getElementsByClassName("amplitude-mute"), a = 0; a < t.length; a++) e ? (t[a].classList.remove("amplitude-not-muted"), t[a].classList.add("amplitude-muted")) : (t[a].classList.add("amplitude-not-muted"), t[a].classList.remove("amplitude-muted"))
				}
			}, "syncVolumeSliders", t), n(e, "syncShuffle", function (e) {
				for (var t = document.getElementsByClassName("amplitude-shuffle"), a = 0; a < t.length; a++) null == t[a].getAttribute("amplitude-playlist") && (e ? (t[a].classList.add("amplitude-shuffle-on"), t[a].classList.remove("amplitude-shuffle-off")) : (t[a].classList.add("amplitude-shuffle-off"), t[a].classList.remove("amplitude-shuffle-on")))
			}), n(e, "syncPlaylistShuffle", function (e, t) {
				for (var a = document.getElementsByClassName("amplitude-shuffle"), l = 0; l < a.length; l++) a[l].getAttribute("amplitude-playlist") == t && (e ? (a[l].classList.add("amplitude-shuffle-on"), a[l].classList.remove("amplitude-shuffle-off")) : (a[l].classList.add("amplitude-shuffle-off"), a[l].classList.remove("amplitude-shuffle-on")))
			}), n(e, "syncMainSliderLocation", a), n(e, "syncPlaylistSliderLocation", u), n(e, "syncSongSliderLocation", s), n(e, "syncVolumeSliderLocation", function (e) {
				for (var t = document.querySelectorAll(".amplitude-volume-slider"), a = 0; a < t.length; a++) t[a].value = e
			}), n(e, "syncSongDuration", function (e) {
				i.default.syncDurationHours(void 0 == e || isNaN(e.hours) ? "00" : e.hours), i.default.syncDurationMinutes(void 0 == e || isNaN(e.minutes) ? "00" : e.minutes), i.default.syncDurationSeconds(void 0 == e || isNaN(e.seconds) ? "00" : e.seconds), i.default.syncDurationTime(void 0 != e ? e : {})
			}), e
		}();
		t.default = s, e.exports = t.default
	}, function (e, t, a) {
		"use strict";
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var l = n(a(0)),
			i = n(a(1)),
			u = n(a(2));

		function n(e) {
			return e && e.__esModule ? e : {
				default: e
			}
		}
		var s = function () {
			function e() {
				i.default.runCallback("before_play"), l.default.active_metadata.live && a(), /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && !l.default.paused && a(), l.default.active_song.play(), l.default.active_song.playbackRate = l.default.playback_speed, i.default.runCallback("after_play")
			}

			function t() {
				l.default.active_song.src = "", l.default.active_song.load()
			}

			function a() {
				l.default.active_song.src = l.default.active_metadata.url, l.default.active_song.load()
			}
			return {
				play: e,
				pause: function () {
					i.default.runCallback("before_pause"), l.default.active_song.pause(), l.default.paused = !0, l.default.active_metadata.live && t(), i.default.runCallback("after_pause")
				},
				stop: function () {
					i.default.runCallback("before_stop"), 0 != l.default.active_song.currentTime && (l.default.active_song.currentTime = 0), l.default.active_song.pause(), l.default.active_metadata.live && t(), i.default.runCallback("after_stop")
				},
				setVolume: function (e) {
					l.default.active_song.volume = e / 100
				},
				setSongLocation: function (e) {
					l.default.active_metadata.live || (l.default.active_song.currentTime = l.default.active_song.duration * (song_percentage / 100))
				},
				skipToLocation: function (e) {
					l.default.active_song.addEventListener("canplaythrough", function () {
						l.default.active_song.duration >= e && e > 0 ? l.default.active_song.currentTime = e : i.default.writeDebugMessage("Amplitude can't skip to a location greater than the duration of the audio or less than 0")
					}, {
						once: !0
					})
				},
				disconnectStream: t,
				reconnectStream: a,
				playNow: function (t) {
					t.url ? (l.default.active_song.src = t.url, l.default.active_metadata = t, l.default.active_album = t.album) : i.default.writeDebugMessage("The song needs to have a URL!"), u.default.syncMainPlayPause("playing"), u.default.displaySongMetadata(), u.default.resetSongSliders(), u.default.resetSongTimeVisualizations(), u.default.resetTimes(), e()
				},
				setPlaybackSpeed: function (e) {
					l.default.playback_speed = e, l.default.active_song.playbackRate = l.default.playback_speed
				}
			}
		}();
		t.default = s, e.exports = t.default
	}, function (e, t, a) {
		"use strict";
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var l = n(a(0)),
			i = n(a(1)),
			u = n(a(7));

		function n(e) {
			return e && e.__esModule ? e : {
				default: e
			}
		}
		var s = function () {
			return {
				initializeEvents: function () {
					i.default.writeDebugMessage("Beginning initialization of event handlers.."), document.addEventListener("touchmove", function () {
							l.default.is_touch_moving = !0
						}), document.addEventListener("touchend", function () {
							l.default.is_touch_moving && (l.default.is_touch_moving = !1)
						}), l.default.active_song.removeEventListener("timeupdate", u.default.updateTime), l.default.active_song.addEventListener("timeupdate", u.default.updateTime), l.default.active_song.removeEventListener("durationchange", u.default.updateTime), l.default.active_song.addEventListener("durationchange", u.default.updateTime), l.default.active_song.removeEventListener("ended", u.default.songEnded), l.default.active_song.addEventListener("ended", u.default.songEnded),
						function () {
							for (var e = document.getElementsByClassName("amplitude-play"), t = 0; t < e.length; t++) /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? (e[t].removeEventListener("touchend", u.default.play), e[t].addEventListener("touchend", u.default.play)) : (e[t].removeEventListener("click", u.default.play), e[t].addEventListener("click", u.default.play))
						}(),
						function () {
							for (var e = document.getElementsByClassName("amplitude-pause"), t = 0; t < e.length; t++) /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? (e[t].removeEventListener("touchend", u.default.pause), e[t].addEventListener("touchend", u.default.pause)) : (e[t].removeEventListener("click", u.default.pause), e[t].addEventListener("click", u.default.pause))
						}(),
						function () {
							for (var e = document.getElementsByClassName("amplitude-play-pause"), t = 0; t < e.length; t++) /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? (e[t].removeEventListener("touchend", u.default.playPause), e[t].addEventListener("touchend", u.default.playPause)) : (e[t].removeEventListener("click", u.default.playPause), e[t].addEventListener("click", u.default.playPause))
						}(),
						function () {
							for (var e = document.getElementsByClassName("amplitude-stop"), t = 0; t < e.length; t++) /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? (e[t].removeEventListener("touchend", u.default.stop), e[t].addEventListener("touchend", u.default.stop)) : (e[t].removeEventListener("click", u.default.stop), e[t].addEventListener("click", u.default.stop))
						}(),
						function () {
							for (var e = document.getElementsByClassName("amplitude-mute"), t = 0; t < e.length; t++) /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? /iPhone|iPad|iPod/i.test(navigator.userAgent) ? i.default.writeDebugMessage("iOS does NOT allow volume to be set through javascript: https://developer.apple.com/library/safari/documentation/AudioVideo/Conceptual/Using_HTML5_Audio_Video/Device-SpecificConsiderations/Device-SpecificConsiderations.html#//apple_ref/doc/uid/TP40009523-CH5-SW4") : (e[t].removeEventListener("touchend", u.default.mute), e[t].addEventListener("touchend", u.default.mute)) : (e[t].removeEventListener("click", u.default.mute), e[t].addEventListener("click", u.default.mute))
						}(),
						function () {
							for (var e = document.getElementsByClassName("amplitude-volume-up"), t = 0; t < e.length; t++) /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? /iPhone|iPad|iPod/i.test(navigator.userAgent) ? i.default.writeDebugMessage("iOS does NOT allow volume to be set through javascript: https://developer.apple.com/library/safari/documentation/AudioVideo/Conceptual/Using_HTML5_Audio_Video/Device-SpecificConsiderations/Device-SpecificConsiderations.html#//apple_ref/doc/uid/TP40009523-CH5-SW4") : (e[t].removeEventListener("touchend", u.default.volumeUp), e[t].addEventListener("touchend", u.default.volumeUp)) : (e[t].removeEventListener("click", u.default.volumeUp), e[t].addEventListener("click", u.default.volumeUp))
						}(),
						function () {
							for (var e = document.getElementsByClassName("amplitude-volume-down"), t = 0; t < e.length; t++) /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? /iPhone|iPad|iPod/i.test(navigator.userAgent) ? i.default.writeDebugMessage("iOS does NOT allow volume to be set through javascript: https://developer.apple.com/library/safari/documentation/AudioVideo/Conceptual/Using_HTML5_Audio_Video/Device-SpecificConsiderations/Device-SpecificConsiderations.html#//apple_ref/doc/uid/TP40009523-CH5-SW4") : (e[t].removeEventListener("touchend", u.default.volumeDown), e[t].addEventListener("touchend", u.default.volumeDown)) : (e[t].removeEventListener("click", u.default.volumeDown), e[t].addEventListener("click", u.default.volumeDown))
						}(),
						function () {
							for (var e = window.navigator.userAgent.indexOf("MSIE "), t = document.getElementsByClassName("amplitude-song-slider"), a = 0; a < t.length; a++) e > 0 || navigator.userAgent.match(/Trident.*rv\:11\./) ? (t[a].removeEventListener("change", u.default.songSlider), t[a].addEventListener("change", u.default.songSlider)) : (t[a].removeEventListener("input", u.default.songSlider), t[a].addEventListener("input", u.default.songSlider))
						}(),
						function () {
							for (var e = window.navigator.userAgent.indexOf("MSIE "), t = document.getElementsByClassName("amplitude-volume-slider"), a = 0; a < t.length; a++) /iPhone|iPad|iPod/i.test(navigator.userAgent) ? i.default.writeDebugMessage("iOS does NOT allow volume to be set through javascript: https://developer.apple.com/library/safari/documentation/AudioVideo/Conceptual/Using_HTML5_Audio_Video/Device-SpecificConsiderations/Device-SpecificConsiderations.html#//apple_ref/doc/uid/TP40009523-CH5-SW4") : e > 0 || navigator.userAgent.match(/Trident.*rv\:11\./) ? (t[a].removeEventListener("change", u.default.volumeSlider), t[a].addEventListener("change", u.default.volumeSlider)) : (t[a].removeEventListener("input", u.default.volumeSlider), t[a].addEventListener("input", u.default.volumeSlider))
						}(),
						function () {
							for (var e = document.getElementsByClassName("amplitude-next"), t = 0; t < e.length; t++) /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? (e[t].removeEventListener("touchend", u.default.next), e[t].addEventListener("touchend", u.default.next)) : (e[t].removeEventListener("click", u.default.next), e[t].addEventListener("click", u.default.next))
						}(),
						function () {
							for (var e = document.getElementsByClassName("amplitude-prev"), t = 0; t < e.length; t++) /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? (e[t].removeEventListener("touchend", u.default.prev), e[t].addEventListener("touchend", u.default.prev)) : (e[t].removeEventListener("click", u.default.prev), e[t].addEventListener("click", u.default.prev))
						}(),
						function () {
							for (var e = document.getElementsByClassName("amplitude-shuffle"), t = 0; t < e.length; t++) e[t].classList.remove("amplitude-shuffle-on"), e[t].classList.add("amplitude-shuffle-off"), /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? (e[t].removeEventListener("touchend", u.default.shuffle), e[t].addEventListener("touchend", u.default.shuffle)) : (e[t].removeEventListener("click", u.default.shuffle), e[t].addEventListener("click", u.default.shuffle))
						}(),
						function () {
							for (var e = document.getElementsByClassName("amplitude-repeat"), t = 0; t < e.length; t++) e[t].classList.remove("amplitude-repeat-on"), e[t].classList.add("amplitude-repeat-off"), /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? (e[t].removeEventListener("touchend", u.default.repeat), e[t].addEventListener("touchend", u.default.repeat)) : (e[t].removeEventListener("click", u.default.repeat), e[t].addEventListener("click", u.default.repeat))
						}(),
						function () {
							for (var e = document.getElementsByClassName("amplitude-playback-speed"), t = 0; t < e.length; t++) /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? (e[t].removeEventListener("touchend", u.default.playbackSpeed), e[t].addEventListener("touchend", u.default.playbackSpeed)) : (e[t].removeEventListener("click", u.default.playbackSpeed), e[t].addEventListener("click", u.default.playbackSpeed))
						}(),
						function () {
							for (var e = document.getElementsByClassName("amplitude-skip-to"), t = 0; t < e.length; t++) /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? (e[t].removeEventListener("touchend", u.default.skipTo), e[t].addEventListener("touchend", u.default.skipTo)) : (e[t].removeEventListener("click", u.default.skipTo), e[t].addEventListener("click", u.default.skipTo))
						}()
				}
			}
		}();
		t.default = s, e.exports = t.default
	}, function (e, t, a) {
		"use strict";
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var l = s(a(0)),
			i = s(a(2)),
			u = s(a(3)),
			n = s(a(1));

		function s(e) {
			return e && e.__esModule ? e : {
				default: e
			}
		}
		var d = function () {
			return {
				computeCurrentTimes: function () {
					var e = {},
						t = (Math.floor(l.default.active_song.currentTime % 60) < 10 ? "0" : "") + Math.floor(l.default.active_song.currentTime % 60),
						a = Math.floor(l.default.active_song.currentTime / 60),
						i = "00";
					return a < 10 && (a = "0" + a), a > 60 && (i = Math.floor(a / 60), a %= 60, i < 10 && (i = "0" + i), a < 10 && (a = "0" + a)), e.seconds = t, e.minutes = a, e.hours = i, e
				},
				computeSongDuration: function () {
					var e = {},
						t = (Math.floor(l.default.active_song.duration % 60) < 10 ? "0" : "") + Math.floor(l.default.active_song.duration % 60),
						a = Math.floor(l.default.active_song.duration / 60),
						i = "00";
					return a < 10 && (a = "0" + a), a > 60 && (i = Math.floor(a / 60), a %= 60, i < 10 && (i = "0" + i), a < 10 && (a = "0" + a)), e.seconds = t, e.minutes = a, e.hours = i, e
				},
				computeSongCompletionPercentage: function () {
					return l.default.active_song.currentTime / l.default.active_song.duration * 100
				},
				setPlaybackSpeed: function (e) {
					u.default.setPlaybackSpeed(e)
				},
				setRepeat: function (e) {
					l.default.repeat = e
				},
				setMainPlayPause: function () {
					l.default.active_song.paused ? (i.default.syncMainPlayPause("playing"), i.default.syncPlaylistPlayPause(l.default.active_playlist, "playing"), i.default.syncSongPlayPause(l.default.active_playlist, l.default.active_index, "playing"), u.default.play()) : (i.default.syncMainPlayPause("paused"), i.default.syncPlaylistPlayPause(l.default.active_playlist, "paused"), i.default.syncSongPlayPause(l.default.active_playlist, l.default.active_index, "paused"), u.default.pause())
				},
				setPlaylistPlayPause: function (e) {
					n.default.checkNewPlaylist(e) && (n.default.setActivePlaylist(e), l.default.shuffled_statuses[e] ? n.default.changeSong(l.default.shuffled_playlists[e][0].original_index) : n.default.changeSong(l.default.playlists[e][0])), l.default.active_song.paused ? (i.default.syncMainPlayPause("playing"), i.default.syncPlaylistPlayPause(l.default.active_playlist, "playing"), i.default.syncSongPlayPause(l.default.active_playlist, l.default.active_index, "playing"), u.default.play()) : (i.default.syncMainPlayPause("paused"), i.default.syncPlaylistPlayPause(l.default.active_playlist, "paused"), i.default.syncSongPlayPause(l.default.active_playlist, l.default.active_index, "paused"), u.default.pause())
				},
				setSongPlayPause: function (e, t) {
					n.default.checkNewPlaylist(e) && (n.default.setActivePlaylist(e), n.default.changeSong(t)), n.default.checkNewSong(t) && n.default.changeSong(t), l.default.active_song.paused ? (i.default.syncMainPlayPause("playing"), i.default.syncPlaylistPlayPause(l.default.active_playlist, "playing"), i.default.syncSongPlayPause(l.default.active_playlist, l.default.active_index, "playing"), u.default.play()) : (i.default.syncMainPlayPause("paused"), i.default.syncPlaylistPlayPause(l.default.active_playlist, "paused"), i.default.syncSongPlayPause(l.default.active_playlist, l.default.active_index, "paused"), u.default.pause())
				},
				setShuffle: function (e) {
					null == e ? (l.default.shuffle_on ? (l.default.shuffle_on = !1, l.default.shuffle_list = {}) : (l.default.shuffle_on = !0, n.default.shuffleSongs()), i.default.syncShuffle(l.default.shuffle_on)) : (l.default.shuffled_statuses[e] ? (l.default.shuffled_statuses[e] = !1, l.default.shuffled_playlists[e] = []) : (l.default.shuffled_statuses[e] = !0, n.default.shufflePlaylistSongs(e)), i.default.syncPlaylistShuffle(l.default.shuffled_statuses[e], e))
				},
				setNext: function () {
					var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0],
						t = 0,
						a = !1;
					l.default.shuffle_on ? l.default.shuffle_active_index + 1 < l.default.shuffle_list.length ? (l.default.shuffle_active_index = parseInt(l.default.shuffle_active_index) + 1, t = l.default.shuffle_list[parseInt(l.default.shuffle_active_index)].original_index) : (l.default.shuffle_active_index = 0, t = 0, a = !0) : (l.default.active_index + 1 < l.default.songs.length ? l.default.active_index = parseInt(l.default.active_index) + 1 : (l.default.active_index = 0, a = !0), t = l.default.active_index), u.default.stop(), n.default.changeSong(t), e && !l.default.repeat && a || u.default.play(), i.default.syncMainPlayPause(), i.default.syncSongPlayPause(null, t), n.default.runCallback("after_next")
				},
				setNextPlaylist: function (e) {
					var t = arguments.length > 1 && void 0 !== arguments[1] && arguments[1],
						a = 0,
						s = !1;
					if (l.default.shuffled_statuses[e]) {
						var d = parseInt(l.default.shuffled_active_indexes[e]);
						d + 1 < l.default.shuffled_playlists[e].length ? (l.default.shuffled_active_indexes[e] = d + 1, a = l.default.shuffled_playlists[e][l.default.shuffled_active_indexes[e]].original_index) : (l.default.shuffled_active_indexes[e] = 0, a = l.default.shuffled_playlists[e][0].original_index, s = !0)
					} else {
						var o = l.default.playlists[e].indexOf(parseInt(l.default.active_index));
						o + 1 < l.default.playlists[e].length ? l.default.active_index = parseInt(l.default.playlists[e][o + 1]) : (l.default.active_index = parseInt(l.default.playlists[e][0]), s = !0), a = l.default.active_index
					}
					u.default.stop(), n.default.changeSong(a), n.default.setActivePlaylist(e), t && !l.default.repeat && s || u.default.play(), i.default.syncMainPlayPause(), i.default.syncPlaylistPlayPause(e), i.default.syncSongPlayPause(e, a), n.default.runCallback("after_next")
				},
				setPrev: function () {
					var e = 0;
					l.default.shuffle_on ? parseInt(l.default.shuffle_active_index) - 1 >= 0 ? (l.default.shuffle_active_index = parseInt(l.default.shuffle_active_index) - 1, e = l.default.shuffle_list[parseInt(l.default.shuffle_active_index)].original_index) : (l.default.shuffle_active_index = l.default.shuffle_list.length - 1, e = l.default.shuffle_list[parseInt(l.default.shuffle_list.length) - 1].original_index) : (parseInt(l.default.active_index) - 1 >= 0 ? l.default.active_index = parseInt(l.default.active_index) - 1 : l.default.active_index = l.default.songs.length - 1, e = l.default.active_index), u.default.stop(), n.default.changeSong(e), u.default.play(), i.default.syncMainPlayPause("playing"), i.default.syncSongPlayPause(null, e, "playing"), n.default.runCallback("after_prev")
				},
				setPrevPlaylist: function (e) {
					var t = 0;
					if (l.default.shuffled_statuses[e]) {
						var a = parseInt(l.default.shuffled_active_indexes[e]);
						a - 1 >= 0 ? (l.default.shuffled_active_indexes[e] = a - 1, t = l.default.shuffled_playlists[e][l.default.shuffled_active_indexes[e]].original_index) : (l.default.shuffled_active_indexes[e] = l.default.shuffled_playlists[e].length - 1, t = l.default.shuffled_playlists[e][l.default.shuffled_playlists[e].length - 1].original_index)
					} else {
						var s = l.default.playlists[e].indexOf(parseInt(l.default.active_index));
						l.default.active_index = s - 1 >= 0 ? parseInt(l.default.playlists[e][s - 1]) : parseInt(l.default.playlists[e][l.default.playlists[e].length - 1]), t = l.default.active_index
					}
					u.default.stop(), n.default.changeSong(t), n.default.setActivePlaylist(e), u.default.play(), i.default.syncMainPlayPause("playing"), i.default.syncPlaylistPlayPause(e, "playing"), i.default.syncSongPlayPause(e, t, "playing"), n.default.runCallback("after_prev")
				}
			}
		}();
		t.default = d, e.exports = t.default
	}, function (e, t, a) {
		"use strict";
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var l = d(a(3)),
			i = d(a(1)),
			u = d(a(4)),
			n = d(a(9)),
			s = d(a(2));

		function d(e) {
			return e && e.__esModule ? e : {
				default: e
			}
		}
		var o = a(0),
			r = function () {
				function e(e) {
					void 0 != e.start_song ? i.default.isInt(e.start_song) ? i.default.changeSong(e.start_song) : i.default.writeDebugMessage("You must enter an integer index for the start song.") : i.default.changeSong(0), o.playback_speed = void 0 != e.playback_speed ? e.playback_speed : 1, l.default.setPlaybackSpeed(o.playback_speed), o.active_song.preload = void 0 != e.preload ? e.preload : "auto", o.callbacks = void 0 != e.callbacks ? e.callbacks : {}, o.volume = void 0 != e.volume ? e.volume : 50, o.volume_increment = void 0 != e.volume_increment ? e.volume_increment : 5, o.volume_decrement = void 0 != e.volume_decrement ? e.volume_decrement : 5, l.default.setVolume(o.volume), s.default.syncVolumeSliders(), void 0 != e.default_album_art ? o.default_album_art = e.default_album_art : o.default_album_art = "", s.default.resetTimes(), s.default.setPlayPauseButtonsToPause(), e.autoplay && (o.active_playlist = null, s.default.syncMainPlayPause("playing"), s.default.syncSongPlayPause(null, 0, "playing"), l.default.play()), i.default.runCallback("after_init")
				}

				function t() {
					for (var e = document.getElementsByClassName("amplitude-song-time-visualization"), t = 0; t < e.length; t++) {
						var a = document.createElement("div");
						a.classList.add("amplitude-song-time-visualization-status"), a.setAttribute("style", "width: 0px"), e[t].innerHTML = "", e[t].appendChild(a)
					}
				}
				return {
					initialize: function (a) {
						var l = !1;
						i.default.resetConfig(), u.default.initializeEvents(), t(), o.debug = void 0 != a.debug && a.debug, a.songs ? 0 != a.songs.length ? (o.songs = a.songs, l = !0) : i.default.writeDebugMessage("Please add some songs, to your songs object!") : i.default.writeDebugMessage("Please provide a songs object for AmplitudeJS to run!"), a.playlists && function (e) {
							var t, a = 0;
							for (t in e) e.hasOwnProperty(t) && a++;
							return i.default.writeDebugMessage("You have " + a + " playlist(s) in your config"), a
						}(a.playlists) > 0 && (o.playlists = a.playlists, function () {
							for (var e = 0; e < o.songs.length; e++) void 0 == o.songs[e].live && (o.songs[e].live = !1)
						}(), function () {
							for (var e in o.playlists)
								if (o.playlists.hasOwnProperty(e) && o.playlists[e].songs)
									for (var t = 0; t < o.playlists[e].songs.length; t++) o.songs[o.playlists[e].songs[t]] || i.default.writeDebugMessage("The song index: " + o.playlists[e].songs[t] + " in playlist with key: " + e + " is not defined in your songs array!")
						}(), function () {
							for (var e in o.playlists) o.shuffled_statuses[e] = !1
						}(), function () {
							for (var e in o.playlists) o.shuffled_playlists[e] = []
						}(), function () {
							for (var e in o.playlists) o.shuffled_active_indexes[e] = 0
						}(), function () {
							for (var e in o.playlists) s.default.setFirstSongInPlaylist(o.songs[o.playlists[e][0]], e)
						}()), l && (o.soundcloud_client = void 0 != a.soundcloud_client ? a.soundcloud_client : "", o.soundcloud_use_art = void 0 != a.soundcloud_use_art ? a.soundcloud_use_art : "", "" != o.soundcloud_client ? (tempUserConfig = a, n.default.loadSoundCloud(tempUserConfig)) : e(a)), i.default.writeDebugMessage("Initialized With: "), i.default.writeDebugMessage(o)
					},
					setConfig: e,
					rebindDisplay: function () {
						u.default.initializeEvents(), t()
					}
				}
			}();
		t.default = r, e.exports = t.default
	}, function (e, t, a) {
		"use strict";
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var l = d(a(0)),
			i = d(a(5)),
			u = d(a(2)),
			n = d(a(3)),
			s = d(a(1));

		function d(e) {
			return e && e.__esModule ? e : {
				default: e
			}
		}
		t.default = {
			updateTime: function () {
				if (!l.default.active_metadata.live) {
					var e = i.default.computeCurrentTimes(),
						t = i.default.computeSongCompletionPercentage(),
						a = i.default.computeSongDuration();
					u.default.syncCurrentTime(e, t), u.default.syncSongDuration(a)
				}
			},
			songEnded: function () {
				"" == l.default.active_playlist || null == l.default.active_playlist ? i.default.setNext(!0) : i.default.setNextPlaylist(l.default.active_playlist, !0)
			},
			play: function () {
				if (!l.default.is_touch_moving) {
					var e = this.getAttribute("amplitude-song-index"),
						t = this.getAttribute("amplitude-playlist");
					null == t && null == e && i.default.setSongPlayPause(l.default.active_playlist, l.default.active_index), null != t && "" != t && (s.default.checkNewPlaylist(t) ? (s.default.setActivePlaylist(t), null != e ? (s.default.changeSong(e), i.default.setPlaylistPlayPause(t)) : (s.default.changeSong(l.default.playlists[t][0]), i.default.setPlaylistPlayPause(t))) : null != e ? (s.default.changeSong(e), i.default.setPlaylistPlayPause(t)) : (s.default.changeSong(l.default.active_index), i.default.setPlaylistPlayPause(t))), null != t && "" != t || null == e || "" == e || ((s.default.checkNewSong(e) || l.default.active_playlist != t) && s.default.changeSong(e), i.default.setSongPlayPause(t, e))
				}
			},
			pause: function () {
				if (!l.default.is_touch_moving) {
					var e = this.getAttribute("amplitude-song-index"),
						t = this.getAttribute("amplitude-playlist");
					null == e && null == t && (i.default.setSongPlayPause(l.default.active_playlist, l.default.active_index), n.default.pause()), (null != t || "" != t && l.default.active_playlist == t) && (u.default.syncMainPlayPause("paused"), u.default.syncPlaylistPlayPause(l.default.active_playlist, "paused"), u.default.syncSongPlayPause(l.default.active_playlist, l.default.active_index, "paused"), n.default.pause()), null != t && "" != t || e != l.default.active_index || (u.default.syncMainPlayPause("paused"), u.default.syncPlaylistPlayPause(l.default.active_playlist, "paused"), u.default.syncSongPlayPause(l.default.active_playlist, l.default.active_index, "paused"), n.default.pause())
				}
			},
			playPause: function () {
				if (!l.default.is_touch_moving)
					if (null != this.getAttribute("amplitude-main-play-pause")) i.default.setMainPlayPause();
					else if (null != this.getAttribute("amplitude-playlist-main-play-pause")) {
					var e = this.getAttribute("amplitude-playlist");
					i.default.setPlaylistPlayPause(e)
				} else {
					e = this.getAttribute("amplitude-playlist");
					var t = this.getAttribute("amplitude-song-index");
					i.default.setSongPlayPause(e, t)
				}
			},
			stop: function () {
				l.default.is_touch_moving || (u.default.setPlayPauseButtonsToPause(), n.default.stop())
			},
			mute: function () {
				l.default.is_touch_moving || (0 == l.default.volume ? (l.default.volume = l.default.pre_mute_volume, u.default.syncMute(!1)) : (l.default.pre_mute_volume = l.default.volume, l.default.volume = 0, u.default.syncMute(!0)), n.default.setVolume(l.default.volume), u.default.syncVolumeSliders(l.default.volume))
			},
			volumeUp: function () {
				l.default.is_touch_moving || (l.default.volume + l.default.volume_increment <= 100 ? l.default.volume = l.default.volume + l.default.volume_increment : l.default.volume = 100, n.default.setVolume(l.default.volume), u.default.syncVolumeSliders(l.default.volume))
			},
			volumeDown: function () {
				l.default.is_touch_moving || (l.default.volume - l.default.volume_increment > 0 ? l.default.volume = l.default.volume - l.default.volume_increment : l.default.volume = 0, n.default.setVolume(l.default.volume), u.default.syncVolumeSliders(l.default.volume))
			},
			songSlider: function () {
				var e = this.value;
				if (null != this.getAttribute("amplitude-main-song-slider")) {
					if (!l.default.active_metadata.live) {
						var t = l.default.active_song.duration * (e / 100);
						isFinite(t) && (l.default.active_song.currentTime = t)
					}
					u.default.syncMainSliderLocation(e), "" != l.default.active_playlist && null != l.default.active_playlist && u.default.syncPlaylistSliderLocation(l.default.active_playlist, e)
				}
				if (null != this.getAttribute("amplitude-playlist-song-slider")) {
					var a = this.getAttribute("amplitude-playlist");
					l.default.active_playlist == a && (l.default.active_metadata.live || (l.default.active_song.currentTime = l.default.active_song.duration * (e / 100)), u.default.syncMainSliderLocation(e), u.default.syncPlaylistSliderLocation(a, e))
				}
				if (null == this.getAttribute("amplitude-playlist-song-slider") && null == this.getAttribute("amplitude-main-song-slider")) {
					a = this.getAttribute("amplitude-playlist");
					var i = this.getAttribute("amplitude-song-index");
					l.default.active_index == i && (l.default.active_metadata.live || (l.default.active_song.currentTime = l.default.active_song.duration * (e / 100)), u.default.syncMainSliderLocation(), "" != l.default.active_playlist && null != l.default.active_playlist && l.default.active_playlist == a && u.default.syncPlaylistSliderLocation(a, location), u.default.syncSongSliderLocation(a, i, location))
				}
			},
			volumeSlider: function () {
				n.default.setVolume(this.value), u.default.syncVolumeSliderLocation(this.value)
			},
			next: function () {
				if (!l.default.is_touch_moving)
					if ("" == this.getAttribute("amplitude-playlist") || null == this.getAttribute("amplitude-playlist")) "" == l.default.active_playlist || null == l.default.active_playlist ? i.default.setNext() : i.default.setNextPlaylist(l.default.active_playlist);
					else {
						var e = this.getAttribute("amplitude-playlist");
						i.default.setNextPlaylist(e)
					}
			},
			prev: function () {
				if (!l.default.is_touch_moving)
					if ("" == this.getAttribute("amplitude-playlist") || null == this.getAttribute("amplitude-playlist")) "" == l.default.active_playlist || null == l.default.active_playlist ? i.default.setPrev() : i.default.setPrevPlaylist(l.default.active_playlist);
					else {
						var e = this.getAttribute("amplitude-playlist");
						i.default.setPrevPlaylist(e)
					}
			},
			shuffle: function () {
				if (!l.default.is_touch_moving)
					if ("" == this.getAttribute("amplitude-playlist") || null == this.getAttribute("amplitude-playlist")) i.default.setShuffle(null);
					else {
						var e = this.getAttribute("amplitude-playlist");
						i.default.setShuffle(e)
					}
			},
			repeat: function () {
				l.default.is_touch_moving || (i.default.setRepeat(!l.default.repeat), u.default.syncRepeat())
			},
			playbackSpeed: function () {
				if (!l.default.is_touch_moving) {
					switch (l.default.playback_speed) {
						case 1:
							i.default.setPlaybackSpeed(1.5);
							break;
						case 1.5:
							i.default.setPlaybackSpeed(2);
							break;
						case 2:
							i.default.setPlaybackSpeed(1)
					}
					u.default.syncPlaybackSpeed()
				}
			},
			skipTo: function () {
				if (!l.default.is_touch_moving)
					if (this.hasAttribute("amplitude-playlist")) {
						var e = this.getAttribute("amplitude-playlist");
						s.default.checkNewPlaylist(e) && s.default.setActivePlaylist(e);
						var t = parseInt(this.getAttribute("amplitude-location")),
							a = (e = this.getAttribute("amplitude-playlist"), parseInt(this.getAttribute("amplitude-song-index")));
						s.default.changeSong(a), n.default.play(), n.default.skipToLocation(t)
					} else {
						t = parseInt(this.getAttribute("amplitude-location")), a = parseInt(this.getAttribute("amplitude-song-index"));
						s.default.changeSong(a), n.default.play(), n.default.skipToLocation(t)
					}
			}
		}, e.exports = t.default
	}, function (e, t, a) {
		"use strict";
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var l = s(a(6)),
			i = s(a(3)),
			u = (s(a(1)), s(a(4)), s(a(5))),
			n = (s(a(2)), s(a(0)));

		function s(e) {
			return e && e.__esModule ? e : {
				default: e
			}
		}

		function d(e, t, a) {
			return t in e ? Object.defineProperty(e, t, {
				value: a,
				enumerable: !0,
				configurable: !0,
				writable: !0
			}) : e[t] = a, e
		}
		var o = function () {
			var e;

			function t(e) {
				return n.default.songs.push(e), n.default.songs.length - 1
			}
			return d(e = {
				init: function (e) {
					l.default.initialize(e)
				},
				bindNewElements: function () {
					l.default.rebindDisplay()
				},
				getActivePlaylist: function () {
					return n.default.active_playlist
				},
				getPlaybackSpeed: function () {
					return n.default.playback_speed
				},
				getRepeat: function () {
					return n.default.repeat
				},
				getShuffle: function () {
					return n.default.shuffle_on
				},
				getShufflePlaylist: function (e) {
					return n.default.shuffled_statuses[e]
				},
				getDefaultAlbumArt: function () {
					return n.default.default_album_art
				},
				setDefaultAlbumArt: function (e) {
					n.default.default_album_art = e
				},
				getSongPlayedPercentage: function () {
					return n.default.active_song.currentTime / n.default.active_song.duration * 100
				},
				setSongPlayedPercentage: function (e) {
					"number" == typeof e && e > 0 && e < 100 && (n.default.active_song.currentTime = n.default.active_song.duration * (e / 100))
				},
				setDebug: function (e) {
					n.default.debug = e
				},
				getActiveSongMetadata: function () {
					return n.default.active_metadata
				},
				getSongByIndex: function (e) {
					return n.default.songs[e]
				},
				getSongAtPlaylistIndex: function (e, t) {
					var a = n.default.playlists[e][t];
					return n.default.songs[a]
				},
				addSong: t,
				playNow: function (e) {
					i.default.playNow(e)
				},
				play: function () {
					i.default.play()
				},
				pause: function () {
					i.default.pause()
				}
			}, "addSong", t), d(e, "audio", function () {
				return n.default.active_song
			}), d(e, "next", function () {
				var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null;
				"" == e || null == e ? null == n.default.active_playlist || "" == n.default.active_playlist ? u.default.setNext() : u.default.setNextPlaylist(n.default.active_playlist) : u.default.setNextPlaylist(e)
			}), d(e, "prev", function () {
				var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null;
				"" == e || null == e ? null == n.default.active_playlist || "" == n.default.active_playlist ? u.default.setPrev() : u.default.setPrevPlaylist(n.default.active_playlist) : u.default.setPrevPlaylist(e)
			}), e
		}();
		t.default = o, e.exports = t.default
	}, function (e, t, a) {
		"use strict";
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var l = n(a(0)),
			i = n(a(1)),
			u = n(a(6));

		function n(e) {
			return e && e.__esModule ? e : {
				default: e
			}
		}
		var s = function () {
			var e = {};

			function t() {
				SC.initialize({
						client_id: l.default.soundcloud_client
					}),
					function () {
						for (var e = /^https?:\/\/(soundcloud.com|snd.sc)\/(.*)$/, t = 0; t < l.default.songs.length; t++) l.default.songs[t].url.match(e) && (l.default.soundcloud_song_count++, a(l.default.songs[t].url, t))
					}()
			}

			function a(t, a) {
				SC.get("/resolve/?url=" + t, function (t) {
					t.streamable ? (l.default.songs[a].url = t.stream_url + "?client_id=" + l.default.soundcloud_client, l.default.soundcloud_use_art && (l.default.songs[a].cover_art_url = t.artwork_url), l.default.songs[a].soundcloud_data = t) : i.default.writeDebugMessage(l.default.songs[a].name + " by " + l.default.songs[a].artist + " is not streamable by the Soundcloud API"), l.default.soundcloud_songs_ready++, l.default.soundcloud_songs_ready == l.default.soundcloud_song_count && u.default.setConfig(e)
				})
			}
			return {
				loadSoundCloud: function (a) {
					e = a;
					var l = document.getElementsByTagName("head")[0],
						i = document.createElement("script");
					i.type = "text/javascript", i.src = "https://connect.soundcloud.com/sdk.js", i.onreadystatechange = t, i.onload = t, l.appendChild(i)
				}
			}
		}();
		t.default = s, e.exports = t.default
	}, function (e, t, a) {
		"use strict";
		Object.defineProperty(t, "__esModule", {
			value: !0
		});
		var l, i = a(0),
			u = (l = i) && l.__esModule ? l : {
				default: l
			};
		var n = function () {
			return {
				syncCurrentHours: function (e) {
					if (null != u.default.active_playlist && "" != u.default.active_playlist) var t = ['.amplitude-current-hours[amplitude-main-current-hours="true"]', '.amplitude-current-hours[amplitude-playlist-current-hours="true"][amplitude-playlist="' + u.default.active_playlist + '"]', '.amplitude-current-hours[amplitude-song-index="' + u.default.active_index + '"]'];
					else t = ['.amplitude-current-hours[amplitude-main-current-hours="true"]', '.amplitude-current-hours[amplitude-song-index="' + u.default.active_index + '"]'];
					if (document.querySelectorAll(t.join()).length > 0)
						for (var a = document.querySelectorAll(t.join()), l = 0; l < a.length; l++) "true" == a[l].getAttribute("amplitude-main-current-hours") ? a[l].innerHTML = e : "" != u.default.active_playlist && null != u.default.active_playlist && a[l].getAttribute("amplitude-playlist") == u.default.active_playlist ? a[l].innerHTML = e : "" == u.default.active_playlist || null == u.default.active_playlist && !a[l].hasAttribute("amplitude-playlist") ? a[l].innerHTML = e : a[l].innerHTML = "00"
				},
				syncCurrentMinutes: function (e) {
					if (null != u.default.active_playlist && "" != u.default.active_playlist) var t = ['.amplitude-current-minutes[amplitude-main-current-minutes="true"]', '.amplitude-current-minutes[amplitude-playlist-current-minutes="true"][amplitude-playlist="' + u.default.active_playlist + '"]', '.amplitude-current-minutes[amplitude-song-index="' + u.default.active_index + '"]'];
					else t = ['.amplitude-current-minutes[amplitude-main-current-minutes="true"]', '.amplitude-current-minutes[amplitude-song-index="' + u.default.active_index + '"]'];
					for (var a = document.querySelectorAll(t.join()), l = 0, i = a.length; l < i; l++) "true" == a[l].getAttribute("amplitude-main-current-minutes") ? a[l].innerHTML = e : "" != u.default.active_playlist && null != u.default.active_playlist && a[l].getAttribute("amplitude-playlist") == u.default.active_playlist ? a[l].innerHTML = e : "" == u.default.active_playlist || null == u.default.active_playlist && !a[l].hasAttribute("amplitude-playlist") ? a[l].innerHTML = e : a[l].innerHTML = "00"
				},
				syncCurrentSeconds: function (e) {
					if (null != u.default.active_playlist && "" != u.default.active_playlist) var t = ['.amplitude-current-seconds[amplitude-main-current-seconds="true"]', '.amplitude-current-seconds[amplitude-playlist-current-seconds="true"][amplitude-playlist="' + u.default.active_playlist + '"]', '.amplitude-current-seconds[amplitude-song-index="' + u.default.active_index + '"]'];
					else t = ['.amplitude-current-seconds[amplitude-main-current-seconds="true"]', '.amplitude-current-seconds[amplitude-song-index="' + u.default.active_index + '"]'];
					for (var a = document.querySelectorAll(t.join()), l = 0, i = a.length; l < i; l++) "true" == a[l].getAttribute("amplitude-main-current-seconds") ? a[l].innerHTML = e : "" != u.default.active_playlist && null != u.default.active_playlist && a[l].getAttribute("amplitude-playlist") == u.default.active_playlist ? a[l].innerHTML = e : "" == u.default.active_playlist || null == u.default.active_playlist && !a[l].hasAttribute("amplitude-playlist") ? a[l].innerHTML = e : a[l].innerHTML = "00"
				},
				syncCurrentTime: function (e) {
					for (var t = ['.amplitude-current-time[amplitude-main-current-time="true"]', '.amplitude-current-time[amplitude-playlist-main-current-time="' + u.default.active_playlist + '"]', '.amplitude-current-time[amplitude-song-index="' + u.default.active_index + '"]'], a = document.querySelectorAll(t.join()), l = 0, i = a.length; l < i; l++) a[l].innerHTML = e.minutes + ":" + e.seconds
				},
				resetCurrentHours: function () {
					for (var e = document.querySelectorAll(".amplitude-current-hours"), t = 0; t < e.length; t++) e[t].innerHTML = "00"
				},
				resetCurrentMinutes: function () {
					for (var e = document.querySelectorAll(".amplitude-current-minutes"), t = 0; t < e.length; t++) e[t].innerHTML = "00"
				},
				resetCurrentSeconds: function () {
					for (var e = document.querySelectorAll(".amplitude-current-seconds"), t = 0; t < e.length; t++) e[t].innerHTML = "00"
				},
				resetCurrentTime: function () {
					for (var e = document.querySelectorAll(".amplitude-current-time"), t = 0; t < e.length; t++) e[t].innerHTML = "00:00"
				},
				syncSongTimeVisualizations: function (e) {
					! function (e) {
						for (var t = document.querySelectorAll('.amplitude-song-time-visualization[amplitude-main-song-time-visualization="true"]'), a = 0; a < t.length; a++) {
							var l = t[a].querySelectorAll(".amplitude-song-time-visualization-status"),
								i = t[a].offsetWidth,
								u = i * (e / 100);
							l[0].setAttribute("style", "width: " + u + "px")
						}
					}(e),
					function (e) {
						for (var t = document.querySelectorAll('.amplitude-song-time-visualization[amplitude-playlist-song-time-visualization="true"][amplitude-playlist="' + u.default.active_playlist + '"]'), a = 0; a < t.length; a++) {
							var l = t[a].querySelectorAll(".amplitude-song-time-visualization-status"),
								i = t[a].offsetWidth,
								n = i * (e / 100);
							l[0].setAttribute("style", "width: " + n + "px")
						}
					}(e),
					function (e) {
						if ("" != u.default.active_playlist && null != u.default.active_playlist)
							for (var t = document.querySelectorAll('.amplitude-song-time-visualization[amplitude-playlist="' + u.default.active_playlist + '"][amplitude-song-index="' + u.default.active_index + '"]'), a = 0; a < t.length; a++) {
								var l = t[a].querySelectorAll(".amplitude-song-time-visualization-status"),
									i = t[a].offsetWidth,
									n = i * (e / 100);
								l[0].setAttribute("style", "width: " + n + "px")
							} else
								for (var t = document.querySelectorAll('.amplitude-song-time-visualization[amplitude-song-index="' + u.default.active_index + '"]'), a = 0; a < t.length; a++)
									if (!t[a].hasAttribute("amplitude-playlist")) {
										var l = t[a].querySelectorAll(".amplitude-song-time-visualization-status"),
											i = t[a].offsetWidth,
											n = i * (e / 100);
										l[0].setAttribute("style", "width: " + n + "px")
									}
					}(e)
				},
				setElementPlay: function (e) {
					e.classList.add("amplitude-playing"), e.classList.remove("amplitude-paused")
				},
				setElementPause: function (e) {
					e.classList.remove("amplitude-playing"), e.classList.add("amplitude-paused")
				},
				syncDurationHours: function (e) {
					if (null != u.default.active_playlist && "" != u.default.active_playlist) var t = ['.amplitude-duration-hours[amplitude-main-duration-hours="true"]', '.amplitude-duration-hours[amplitude-playlist-duration-hours="true"][amplitude-playlist="' + u.default.active_playlist + '"]', '.amplitude-duration-hours[amplitude-song-index="' + u.default.active_index + '"]'];
					else t = ['.amplitude-duration-hours[amplitude-main-duration-hours="true"]', '.amplitude-duration-hours[amplitude-song-index="' + u.default.active_index + '"]'];
					if (document.querySelectorAll(t.join()).length > 0)
						for (var a = document.querySelectorAll(t.join()), l = 0; l < a.length; l++) "true" == a[l].getAttribute("amplitude-main-duration-hours") ? a[l].innerHTML = e : "" != u.default.active_playlist && null != u.default.active_playlist && a[l].getAttribute("amplitude-playlist") == u.default.active_playlist ? a[l].innerHTML = e : "" == u.default.active_playlist || null == u.default.active_playlist && !a[l].hasAttribute("amplitude-playlist") ? a[l].innerHTML = e : a[l].innerHTML = "00"
				},
				syncDurationMinutes: function (e) {
					if (null != u.default.active_playlist && "" != u.default.active_playlist) var t = ['.amplitude-duration-minutes[amplitude-main-duration-minutes="true"]', '.amplitude-duration-minutes[amplitude-playlist-duration-minutes="true"][amplitude-playlist="' + u.default.active_playlist + '"]', '.amplitude-duration-minutes[amplitude-song-index="' + u.default.active_index + '"]'];
					else t = ['.amplitude-duration-minutes[amplitude-main-duration-minutes="true"]', '.amplitude-duration-minutes[amplitude-song-index="' + u.default.active_index + '"]'];
					for (var a = document.querySelectorAll(t.join()), l = 0; l < a.length; l++) "true" == a[l].getAttribute("amplitude-main-duration-minutes") ? a[l].innerHTML = e : "" != u.default.active_playlist && null != u.default.active_playlist && a[l].getAttribute("amplitude-playlist") == u.default.active_playlist ? a[l].innerHTML = e : "" == u.default.active_playlist || null == u.default.active_playlist && !a[l].hasAttribute("amplitude-playlist") ? a[l].innerHTML = e : a[l].innerHTML = "00"
				},
				syncDurationSeconds: function (e) {
					if (null != u.default.active_playlist && "" != u.default.active_playlist) var t = ['.amplitude-duration-seconds[amplitude-main-duration-seconds="true"]', '.amplitude-duration-seconds[amplitude-playlist-duration-seconds="true"][amplitude-playlist="' + u.default.active_playlist + '"]', '.amplitude-duration-seconds[amplitude-song-index="' + u.default.active_index + '"]'];
					else t = ['.amplitude-duration-seconds[amplitude-main-duration-seconds="true"]', '.amplitude-duration-seconds[amplitude-song-index="' + u.default.active_index + '"]'];
					for (var a = document.querySelectorAll(t.join()), l = 0; l < a.length; l++) "true" == a[l].getAttribute("amplitude-main-duration-seconds") ? a[l].innerHTML = e : "" != u.default.active_playlist && null != u.default.active_playlist && a[l].getAttribute("amplitude-playlist") == u.default.active_playlist ? a[l].innerHTML = e : "" == u.default.active_playlist || null == u.default.active_playlist && !a[l].hasAttribute("amplitude-playlist") ? a[l].innerHTML = e : a[l].innerHTML = "00"
				},
				syncDurationTime: function (e) {
					for (var t = ['.amplitude-duration-time[amplitude-main-duration-time="true"]', '.amplitude-duration-time[amplitude-playlist-main-duration-time="' + u.default.active_playlist + '"]', '.amplitude-duration-time[amplitude-song-index="' + u.default.active_index + '"]'], a = document.querySelectorAll(t.join()), l = 0; l < a.length; l++) isNaN(e.minutes) || isNaN(e.seconds) ? a[l].innerHTML = "00:00" : a[l].innerHTML = e.minutes + ":" + e.seconds
				}
			}
		}();
		t.default = n, e.exports = t.default
	}])
})