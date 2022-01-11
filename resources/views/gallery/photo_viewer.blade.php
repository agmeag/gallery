@extends('layouts.layout')
@section('head')
<link rel="stylesheet" href="/assets/css/vuetify.min.css">
<link rel="stylesheet" href="/assets/css/materialdesignicons.min.css">
<script src="/assets/js/vue.js"></script>
<script src="/assets/js/vuetify.js"></script>
<script src="assets/lottiefiles/lottie-player.js"></script>
<style>
    [v-cloak] {
        display: none;
    }

    .flex-w-ct {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .single-img-cnt {
        /* width: 60%;
        height: 200px;
        overflow: hidden;
        border-radius: 12px;
        padding: 20px; */
        display: flex;
        justify-content: center;
    }

    .single-img {
        border-radius: 25px;
        object-fit: cover;
        width: 100%;
        height: 430px;
    }



    .change-btn {
        background-color: #09F;
        color: white;
    }

    .left-btn {
        background-color: #3AAF85;
        color: white;
    }

    .right-btn {
        background-color: #25D366;
        color: white;
    }

    .delete-btn {
        background-color: #DF2029;
        color: white;
    }

    /* .btn-ct {
        margin: 2px;
        cursor: pointer;
        text-transform: uppercase;
        font-weight: bolder;
        border-radius: 12px;
        padding: 10px;
        transition: all 0.5s;
    } */

    .btn-ct:hover {
        background-color: #fff;
        color: #000;
    }

    #app {
        width: 100%;
        overflow-x: none;
        background-color: #000000d6;
        height: 100%;
        min-height: 100%;
    }

    .w-100 {
        width: 100%;
    }

    .buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        /* overflow-x: scroll; */
        width: 100%;
        background-color: transparent;
    }

    .btn-ct {
        background-color: transparent;
        /* border-right: 3px solid #7d7d7d;
        border-left: 3px solid #7d7d7d; */
        padding: 10px 10px;
        font-weight: bolder;
        cursor: pointer;
        /* width: 110px; */
    }

    .divisor {
        width: 2px;
        background-color: #646464;
        height: 40px;
        min-height: 100%;
        height: 40px;
    }

    .flex {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .ma-0-pa-0 {
        padding: 0;
        margin: 0;
    }

    .content {
        background-color: #000000db;
    }

    .bordered {
        border-radius: 12px;
    }

    .b-font {
        font-size: 2rem;
    }
</style>
@endsection
@section('content')
<div id="app" class="unselectable" v-cloak style="background-color: transparent !important;">


    <template v-if="!multiple">
        <div class="buttons">
            <div v-on:click="toogleImagesGrid()" class="change-btn btn-ct">
                change
            </div>
            <div v-on:click="deleteFile(image,index)" class="delete-btn btn-ct">
                delete
            </div>
        </div>
        <!-- <div> -->
        <div class="buttons">
            <div v-on:click="moveToFolder('/University',image, index)" class="change-btn btn-ct">
                University
            </div>
            <!-- <div class="divisor"></div> -->
            <div v-on:click="moveToFolder('/Miguel',image, index)" class="delete-btn btn-ct">
                Miguel
            </div>
            <!-- <div class="divisor"></div> -->
            <div v-on:click="moveToFolder('/Family',image, index)" class="change-btn btn-ct">
                Family
            </div>
            <!-- <div class="divisor"></div> -->
            <div v-on:click="moveToFolder('/Friends',image, index)" class="left-btn btn-ct">
                Friends
            </div>
            <!-- <div class="divisor"></div> -->
            <div v-on:click="moveToFolder('/Ideas',image, index)" class="right-btn btn-ct">
                Ideas
            </div>
            <!-- <div class="divisor"></div> -->
            <div v-on:click="moveToFolder('/Me',image, index)" class="delete-btn btn-ct">
                Me
            </div>
            <!-- <div class="divisor"></div> -->
            <div v-on:click="moveToFolder('/Memes',image, index)" class="left-btn btn-ct">
                Memes
            </div>
            <!-- <div class="divisor"></div> -->
            <div v-on:click="moveToFolder('/Games',image,index)" class="right-btn btn-ct">
                Games
            </div>
        </div>
        <!-- </div> -->
        <div class="w-100 flex ma-0-pa-0">
            <v-row class="w-100 flex ma-0-pa-0">
                <v-col cols="6" class="ma-0-pa-0">
                    <v-text-field hide-details="true" dense label="Image" placeholder="Image" outlined v-model="image"
                        readonly class="ma-0-pa-0" dark></v-text-field>
                </v-col>
                <v-col cols="6" class="ma-0-pa-0">
                    <v-text-field hide-details="true" dense label="New Name Image" placeholder="New Name Image" outlined
                        v-model="newName" clearable class="ma-0-pa-0" dark>
                    </v-text-field>
                </v-col>
            </v-row>
        </div>
        <div class="flex-w-ct">
            <div v-on:click="previousImage" class="left-btn btn-ct bordered flex b-font">
                <i class='bx bxs-left-arrow'></i>
            </div>
            <div class="single-img-cnt">
                <img :src="image" alt="" class="single-img">
            </div>
            <div v-on:click="nextImage" class="right-btn btn-ct bordered flex b-font">
                <i class='bx bxs-right-arrow'></i>
            </div>
        </div>

    </template>

    <template v-if="multiple">
        <div style="display: flex; flex-wrap: wrap">
            <div>
                <div v-on:click="toogleImagesGrid()">
                    change
                </div>
                <div v-on:click="previousImage">
                    left
                </div>
                <div v-on:click="nextImage">
                    right
                </div>
            </div>
            <template v-for="(item, i) in current_files">
                <div style="width: 100px; height: 100px;">
                    <img :src="item.file" alt="" style="width: 100%; object-fit: cover;">
                </div>
                <div v-on:click="deleteFile(item.file,item.index,i)">
                    delete
                </div>
            </template>
        </div>

    </template>

</div>
@endsection
@section('scripts')
<script src="{{url('/assets/js/vuetify.js')}}"></script>
<script src="/assets/js/axios.min.js"></script>
<script type="module">
    axios.defaults.headers.common = {
        "X-Requested-With": "XMLHttpRequest",
    };

    new Vue({
        el: '#app',
        vuetify: new Vuetify({
        }),
        data() {
            return {
                variable: null,
                files: [],
                index: 0,
                image: null,
                current_files: [],
                multiple: false,
                baseUrl: '/manual/',
                newName: null,
            };
        },

        beforeMount() {
            this.getFiles();
        },
        mounted() {
            window.addEventListener("keyup", (ev) => {
                this.detectKey(ev); // declared in your component methods
            });
        },

        created() {

        },

        destroyed() {
        },
        methods: {
            detectKey(ev) {
                let keycode = ev.keyCode;
                // this.emptyDialog = true;
                //Key Space
                switch (keycode) {
                    // Key Space
                    case 32:
                        // this.toogleImagesGrid();
                        break;
                    // Left
                    case 37:
                        this.previousImage();
                        break;
                    // Right
                    case 39:
                        this.nextImage();
                        break;
                }
            },

            changeImages() {
                if (this.multiple) {
                    this.current_files = [];
                    for (var i = this.index; i < this.index + 20; i++) {

                        if (this.files[i]) {
                            let obj = {
                                index: i,
                                file: this.baseUrl + this.files[i].basename,
                            };
                            this.current_files.push(obj);
                        }
                    }
                } else {
                    this.image = this.files[this.index] ? this.baseUrl + this.files[this.index].basename : null;
                }
            },

            toogleImagesGrid() {
                this.multiple = !this.multiple;
                this.changeImages();
            },

            previousImage() {
                if (this.index > 0) {
                    this.index -= 1;
                }
                this.changeImages();
                this.newName = null;
            },
            nextImage() {
                this.index += 1;
                if (this.files.length == this.index) {
                    this.index = this.files.length - 1;
                }
                this.changeImages();
                this.newName = null;
            },
            getFiles() {
                console.log('se hizo')
                this.loading = true;
                axios.get('/gallery/get_files',
                    {})
                    .then((response) => {
                        this.files = response.data;
                        this.loading = false;
                        this.changeImages();
                    })
                    .catch((error) => {
                        this.loading = false;
                        window.console.log(error);
                        if (error.response) {
                            window.console.log(error.response);
                            if (error.response.status == 401) {
                                location.reload();
                            }
                        }
                    })
            },

            deleteFile(image, i, i2 = null) {
                console.log('se hizo')
                this.loading = true;
                let formData = new FormData();
                formData.append("image", image);
                axios.post('/gallery/delete_file', formData)
                    .then((response) => {
                        if (this.multiple) {
                            this.files.splice(i, 1);
                            this.current_files.splice(i2, 1);
                        } else {
                            this.files.splice(i, 1);
                            // this.index += 1;
                            if (this.files.length == this.index) {
                                this.index = this.files.length - 1;
                            }
                            this.newName = null;
                            this.image = this.files[this.index] ? this.baseUrl + this.files[this.index].basename : null;
                        }
                        this.loading = false;
                    })
                    .catch((error) => {
                        this.loading = false;
                        window.console.log(error);
                        if (error.response) {
                            window.console.log(error.response);
                            if (error.response.status == 401) {
                                location.reload();
                            }
                        }
                    })
            },

            moveToFolder(folder, image, i, i2 = null) {
                this.loading = true;
                if (this.newName == null || this.newName == '') {
                    this.newName = this.image;
                }
                let formData = new FormData();
                formData.append("fileName", this.image);
                formData.append("newPath", folder);
                formData.append("newFileName", this.newName);
                axios.post('/gallery/move-file', formData)
                    .then((response) => {
                        if (this.multiple) {
                            this.files.splice(i, 1);
                            this.current_files.splice(i2, 1);
                        } else {
                            this.files.splice(i, 1);
                            // this.index += 1;
                            if (this.files.length == this.index) {
                                this.index = this.files.length - 1;
                            }
                            this.newName = null;
                            this.image = this.files[this.index] ? this.baseUrl + this.files[this.index].basename : null;
                        }
                        this.loading = false;
                    })
                    .catch((error) => {
                        this.loading = false;
                        window.console.log(error);
                        if (error.response) {
                            window.console.log(error.response);
                            if (error.response.status == 401) {
                                location.reload();
                            }
                        }
                    })
            },


        },
    });
</script>
@endsection