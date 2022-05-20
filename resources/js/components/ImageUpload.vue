<template>
    <div class="image-uploader">
        <div class="progress">
            <div class="progress-bar" role="progressbar" :style="{width: fileProgress + '%'}">
                {{ fileCurrent + '%'}}
            </div>

            <hr>
            
            <form action="http://localhost/PietraBianca/public/feedback/send" method="post" enctype="multipart/form-data">
                <div id="customCSRF">
                    
                </div>
                <input type="file" name="image" id="image" multiple="" @change="fileInputChange">
                
                <button type="submit" class="btn btn-success">Upload</button>
            </form>

            <hr>

            <div class="lists">
                <div class="queue">
                    <h3>Файлы в очереди {{ filesOrder.length }}</h3>
                    <ul class="list-groub">
                        <li class="list-item" v-for="file in filesOrder">
                            {{ file.name }} : {{ file.type }}
                        </li>
                    </ul>
                </div>

                <div class="finished">
                    <h3>Загруженные файлы ({{ filesFinish.length }})</h3>
                    <ul class="list-groub">
                        <li class="list-item" v-for="file in filesFinish">
                            {{ file.name }} : {{ file.type }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";



    export default {
        data(){
            return{
                filesOrder: [],
                filesFinish: [],
                fileProgress: 0,
                fileCurrent: ''
                
            }

        },
        mounted (){
            let csrfToken = document.getElementsByName('_token')[0];
            console.log("CSRF inputs:", csrfToken);
            document.getElementById('customCSRF').innerHTML = csrfToken.outerHTML;
        },
        methods: {
            async fileInputChange(){
                let files = Array.from(event.target.files);
                this.filesOrder = files.slice();

                for(let item of files) {
                    await this.uploadFile(item);
                }
            },
            async uploadFile(item) {
                let form = new FormData();
                form.append('image', item);

                await axios.post('feedback', form, {
                        onUploadProgress: (itemUpload) =>{
                            this.fileProgress = Math.round( (itemUpload.loaded / itemUpload.total) * 100);
                            this.fileCurrent = item.name + ' ' + this.fileProgress;
                        }
                    }
                )
                .then(response => {
                    this.fileProgress = 0;
                    this.fileCurrent= '';
                    this.filesFinish.push(item);
                    this.filesOrder.splice(item, 1);
                })
                .catch(error => {
                    console.log('я ошибка',error);
                })
            }
        }
    }
</script>
